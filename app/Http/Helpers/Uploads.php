<?php


namespace App\Http\Helpers;


class Uploads {



    public static function getEventImageFolder($value)
    {
        return asset("uploads/events/images/{$value}");
    }

    public static function getPostImageFolder($value)
    {
        return asset("uploads/post/images/{$value}");
    }

    public static function getAudioFolder($value)
    {
        return asset("uploads/audio/{$value}");
    }



}
