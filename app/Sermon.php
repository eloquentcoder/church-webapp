<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{

    protected $guarded = [];

    public function getExcerptAttribute()
    {
        $formatted = substr($this->message,0,60);
        return "{$formatted}...";
    }

    public function getPublishedDateAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->toFormattedDateString();
    }



}
