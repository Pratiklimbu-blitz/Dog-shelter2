<?php

namespace App\Constants;

class DogStatus{

    const AVAILABLE = "available";

    const REQUESTED ="requested";

    const ADOPTED ="adopted";

    const LIST = [
        self::AVAILABLE => "Available",
        self::REQUESTED => 'Requested',
        self::ADOPTED => 'Adopted'
    ];
}
