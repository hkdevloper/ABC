<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\TempFiles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // Function to View All Media
    public static function uploadMedia($folder)
    {
        // get temp file details from database
        $temp_file = TempFiles::where('folder', $folder)->first();
        if (!$temp_file) {
            // if no temp file found
            return false;
        }
        $file_name = time() . '_' . $temp_file->filename;
        $from = public_path('/uploads/temp/' . $temp_file->folder . '/' . $temp_file->filename);
        $to = public_path('/uploads/media/' . $file_name);
        // if media folder not exist create it
        if (!File::exists(public_path('/uploads/media/'))) {
            File::makeDirectory(public_path('/uploads/media/'));
        }
        // rename file
        copy($from, $to);
        $data = new Media();
        $data->name = $file_name;
        $data->mime_type = $temp_file->mime;
        $data->upload_type = $temp_file->upload_type;
        $data->size = $temp_file->size;
        $data->path = '/uploads/media/' . $file_name;
        $data->save();
        // delete temp file from storage
        File::deleteDirectory(public_path() . '/uploads/temp/' . $temp_file->folder);
        $temp_file->delete();
        return $data->id;
    }

    // Static Function to upload media

    public function viewMedia()
    {
        // get all media files
        $medias = Media::all();
        $data = compact('medias');
        return view('pages.admin.media.view_all')->with($data);
    }

    // Function to Delete Media

    public function doDeleteMedia($id)
    {
        $data = Media::find($id);
        Storage::delete('public/' . $data->path);
        $data->delete();
        return redirect()->back()->with('success', 'Media Deleted Successfully');
    }
}
