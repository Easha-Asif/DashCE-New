<?php

namespace App\Classes;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function sendEmail($file, $parameter, $use)
    {
        try {
            Mail::send('emails.'.$file, $parameter, function ($message) use ($use) {
                $message->to($use['email'], $use['name'])->subject($use['subject']);
                $message->from('support@ahmed.com', 'Elle');
            });
        } catch (\Exception $ex) {
            // dd($ex);
        }
    }

    public static function deleteImage($image)
    {
        if (File::exists(public_path(str_replace('/public', "", $image)))) {
            File::delete(public_path(str_replace('/public', "", $image)));
        }
    }
}