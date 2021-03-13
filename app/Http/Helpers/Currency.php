<?php


namespace App\Http\Helpers;



class Currency {



    public static function moneyFomatter($value)
    {
        $formatted =  number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $value)), 2);
        return $value < 0 ? "(₦{$formatted})" : "₦{$formatted}";
    }


}
