<?php

namespace App\Helpers;

class MyHelper
{
    public function convertDay( int $number )
    {
        //$days = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه'];

        $days = [ 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ];
        return $days[ $number ];
    }

    public static function instance()
    {
        return new MyHelper();
    }
}
