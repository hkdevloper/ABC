<?php

namespace App\classes;

use App\Models\RateReview;
use App\Models\StatCounter;
use Exception;
use Throwable;

class HelperFunctions
{
    // Function to Update Stat Counter
    public static function updateStat($type, $category, $id): bool
    {

        try {
            $stat = StatCounter::where('type', $type)->where('category', $category)->where('field_id', $id)->first();
            if ($stat) {
                $stat->count = $stat->count + 1;
            } else {
                $stat = new StatCounter();
                $stat->type = $type;
                $stat->category = $category;
                $stat->field_id = $id;
                $stat->count = 1;
            }
            try {
                $stat->saveOrFail();
            } catch (Throwable $e) {
            }
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    // Function to get Counter state
    public static function getStat($type, $category, $id): int
    {
        try {
            $stat = StatCounter::where('type', $type)->where('category', $category)->where('field_id', $id)->first();
            if ($stat) {
                return $stat->count;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return 0;
        }
    }

    // Function to Store Base64 Image return File Name
    public static function storeBase64Image($base64Image, $path, $fileName): string
    {
        try {
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
            if (!is_dir(public_path('storage/requirements'))) {
                mkdir(public_path('storage/requirements'));
            }
            // Store the image in the specified path.
            file_put_contents($path, $imageData);

            // Return the path of the stored image.
            return "requirements/$name";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Function to Format Currency
    public static function formatCurrency($amount): string
    {
        return number_format($amount, 2, '.', ',');
    }

    // Function to get Rating Count
    public static function getRatingCount($type, $id): int
    {
        try {
            $rating = RateReview::where('type', $type)->where('item_id', $id)->get();
            if ($rating) {
                return count($rating);
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return 0;
        }
    }

    // Function to get Rating Average
    public static function getRatingAverage($type, $id): float
    {
        try {
            $rating = RateReview::where('type', $type)->where('item_id', $id)->get();
            if ($rating->count() > 0) {
                $total = 0;
                foreach ($rating as $item) {
                    $total += $item->rating;
                }
                $average_rating = $total / $rating->count();
                return number_format((float)$average_rating, 2, '.', '');
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return 0;
        }
    }

    // Function to get Discounted Price
    public static function getDiscountedPercentage($discount_price, $original_price): float
    {
        if ($original_price > 0) {
            $discount = $original_price - $discount_price;
            $percentage = ($discount / $original_price) * 100;
            return number_format((float)$percentage, 2, '.', '');
        } else {
            return 0;
        }
    }

    // Function to get Secure Email Address to Display
    public static function secureEmailAddress($email): string
    {
        try{
            // Extract domain
            $parts = explode('@', $email);
            $username = $parts[0];
            $domainParts = explode('.', $parts[1]);
            $domain = end($domainParts);

            // Secure the username
            $securedUsername = str_repeat('*', strlen($username));

            // Secure the domain
            $securedDomain = str_repeat('*', strlen($parts[1]));

            return $securedUsername . '@' . $securedDomain . '.' . $domain;
        }catch (Exception $e){
            return '********@********.com';
        }
    }


    // Function to Hide Website Until user not Paid for it
    public static function secureWebsiteUrl($url): string
    {
        return "www.********.com";
    }

    // Function to get Secure Phone Number to Display
    public static function securePhoneNumber($phone): string
    {
        // Get the last 4 digits of the phone number
        $last4Digits = substr($phone, -4);
        // Replace the first 7 digits with asterisks
        return '***-***-' . $last4Digits;
    }
}
