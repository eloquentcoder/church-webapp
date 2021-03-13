<?php

namespace App;

use App\Http\Helpers\Uploads;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['about_pastor', 'about_church', 'sermon_clip', 'sermon_clip_title', 'phone_number', 'alt_number', 'email', 'address'];

    public function getSermonClipAttribute($value)
    {
        return Uploads::getAudioFolder($value);
    }

    public function getAboutPastorExcerptAttribute()
    {
        $formatted = substr($this->about_pastor, 30);
        return "{$formatted}...";
    }

    public function getAboutChurchExcerptAttribute()
    {
        $formatted = substr($this->about_church, 30);
        return "{$formatted}...";
    }


}
