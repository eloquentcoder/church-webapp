<?php

namespace App;

use Carbon\Carbon;
use App\Http\Helpers\Uploads;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'starts', 'ends', 'time', 'venue', 'country'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getStartsAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->toFormattedDateString();
    }

    public function getEndsAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->toFormattedDateString();
    }

    public function getImageAttribute($value)
    {
        return Uploads::getEventImageFolder($value);
    }

}
