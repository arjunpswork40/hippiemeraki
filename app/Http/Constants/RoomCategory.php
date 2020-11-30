<?php

namespace App\Http\Constants;


class RoomCategory
{


    const DELUX_CATEGORY = 1;
    const DOUBLE_CATEGORY = 2;
    const PREMIUM_CATEGORY = 3;

    const TYPES = [
        self::DELUX_CATEGORY => 'Delux',
        self::DOUBLE_CATEGORY => 'Double',
        self::PREMIUM_CATEGORY => 'Premium'
    ];

}

