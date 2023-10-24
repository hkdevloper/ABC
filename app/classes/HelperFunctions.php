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



}
