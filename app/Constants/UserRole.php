<?php

namespace App\Constants;

class UserRole {

    const ADMIN = 'admin';

    const BASIC_USER = 'basicUser';

    const SUPER_ADMIN = 'superAdmin';

    const ADMIN_LIST = [self::SUPER_ADMIN, self::ADMIN];

    public const LIST = [
        self::ADMIN       => [
            'label' => 'Admin',
            'name'  => self::ADMIN,
        ],
        self::BASIC_USER  => [
            'label' => 'Basic User',
            'name'  => self::BASIC_USER,
        ],
        self::SUPER_ADMIN => [
            'label' => 'Super Admin',
            'name'  => self::SUPER_ADMIN,
        ],
    ];
}
