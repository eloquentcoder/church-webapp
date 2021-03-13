<?php

namespace App\Http\Helpers;

use App\Reservation;
use Illuminate\Support\Str;

class UniqueNumber {

    public static function uniqueTicketNo()
    {
        $ticket_pass = 'AA' . Str::uuid();
        $ticket_numbers = Reservation::select('unique_pass')->get()->toArray();
        if(in_array($ticket_pass, $ticket_numbers)){
            return self::createAcctNo();
        }
        return $ticket_pass;
    }

}
