<?php

namespace App\classes;

use App\Models\StatCounter;

class HelperFunctions
{
    // Function to Update Stat Counter
    public static function updateStat($type, $category, $id) : bool {

        try{
            $stat = StatCounter::where('type', $type)->where('category', $category)->where('field_id', $id)->first();
            if($stat){
                $stat->count = $stat->count + 1;
                $stat->save();
            }else{
                $stat = new StatCounter();
                $stat->type = $type;
                $stat->category = $category;
                $stat->field_id = $id;
                $stat->count = 1;
                $stat->save();
            }
            return true;

        }catch (\Exception $e){
            return false;
        }
    }

    // Function to get Counter state
    public static function getStat($type, $category, $id) : int {
        try{
            $stat = StatCounter::where('type', $type)->where('category', $category)->where('field_id', $id)->first();
            if($stat){
                return $stat->count;
            }else{
                return 0;
            }
        }catch (\Exception $e){
            return 0;
        }
    }

    // Function to Store Base64 Image return File Name
    public static function storeBase64Image($base64Image, $path, $fileName) : string {
        try{
            // Extract the image data from the base64 string.
            list($type, $data) = explode(';', $base64Image);
            list(, $data) = explode(',', $data);

            // Decode the base64 data into binary image data.
            $imageData = base64_decode($data);

            // Get File Extension
            $extension = explode('/', $type)[1];

            // Generate a unique name for the image file.
            $rand = rand(111111, 999999);
            $fileName = str_replace(' ', '-', $fileName);
            $name = "$fileName-$rand.$extension";
            // Define the path where you want to store the image.
            $path = public_path('storage/requirements/' . $name); // Adjust the path as needed.

            // check if the directory exists
            if(!is_dir(public_path('storage/requirements'))){
                mkdir(public_path('storage/requirements'));
            }
            // Store the image in the specified path.
            file_put_contents($path, $imageData);

            // Return the path of the stored image.
            return "requirements/$name";
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
