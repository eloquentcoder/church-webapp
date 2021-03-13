<?php

namespace App;

use App\Http\Helpers\Uploads;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getExcerptAttribute()
    {
        $formatted = substr($this->post,0,60);
        return "{$formatted}...";
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->toFormattedDateString();
    }

    public function getImageAttribute($value)
    {
        return Uploads::getPostImageFolder($value);
    }

}
