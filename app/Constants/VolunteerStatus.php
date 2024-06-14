<?php

namespace App\Constants;

class VolunteerStatus{

    const REQUESTED = "requested";

    const REJECTED ="rejected";

    const APPROVED ="approved";

    const LIST = [
        self::REQUESTED => 'Requested',
        self::REJECTED => "Rejected",
        self::APPROVED => 'Approved'
    ];

}
