<?php
/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-06
 * Time: 2:55 PM
 */

namespace App\Utils;


class RoleUtil
{

    public const NAME_SUPERADMIN = "SUPERADMIN";
    public const NAME_MARKETPLACEADMIN = "MARKETPLACEADMIN";
    public const NAME_ADMIN = "ADMIN";
    public const NAME_CUSTOMER = "CUSTOMER";

    public const NAME_ALIASES = [
        'super' => self::NAME_SUPERADMIN,
        'marketplace' => self::NAME_MARKETPLACEADMIN,
        'admin' => self::NAME_ADMIN,
        'customer' => self::NAME_CUSTOMER
    ];

    public static function alias($alias)
    {
        try {
            return self::NAME_ALIASES[$alias];
        } catch (\OutOfBoundsException $e) {
            return null;
        }
    }

}
