<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TempFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadMediaController extends Controller
{
    public function upload(Request $request)
    {
        // check if the request has file field
        if (!$request->has('file')) {
            return response(status: 404);
        }
        // Store the File in temporary location
        $folder = uniqid() . '-' . now()->timestamp;
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        // get mime types of the file
        $mime = $file->getMimeType();

        // get size of the file
        $size = $file->getSize();
        // $file->storeAs('public/temp/' . $folder, $filename);
        $destinationPath = public_path() . '/uploads/temp/' . $folder . '/';
        $file->move($destinationPath, $filename);

        // get value from header
        $type = $request->header('upload_type');

        // store file in temporaryFile Database
        $tempFile = new TempFiles();
        $tempFile->folder = $folder;
        $tempFile->mime = $mime;
        $tempFile->size = $size;
        $tempFile->upload_type = $type ? $type : 'unknown';
        $tempFile->filename = $filename;
        $tempFile->save();

        // return the filepond object
        return response()->json(['folder' => $folder]);
    }

    public function delete(Request $request)
    {
        $validation = $request->validate([
            'folder' => 'required|string',
        ]);

        // get the file from temporaryFile Database and delete it
        $tempFile = TempFiles::where('folder', $request->folder)->first();
        // remove the file from storage
        File::deleteDirectory(public_path('/uploads/temp/' . $request->folder));
        if ($tempFile) {
            $tempFile->delete();
        }
        return response()->json($request->all());
    }
}
