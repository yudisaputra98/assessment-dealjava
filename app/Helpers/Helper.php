<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{

    public static function checkKey($key)
    {
        if($key === "client-adfasdf123sdfbadsftwkljlkjl") {
            return true;
        }

        return false;
    }

}
