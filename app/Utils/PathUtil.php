<?php
/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-06
 * Time: 2:55 PM
 */

namespace App\Utils;


class PathUtil
{

    public const PATH_ARC_FRONT = "images/arc/front/";
    public const PATH_ARC_BACK = "images/arc/back/";
    public const PATH_SELFIE = "images/selfie/";

    public static function getFullPathARCFront($name)
    {
        return self::PATH_ARC_FRONT . $name;
    }

    public static function getFullPathARCBack($name)
    {
        return self::PATH_ARC_BACK . $name;
    }

    public static function getFullPathSelfie($name)
    {
        return self::PATH_SELFIE . $name;
    }

    public static function getFullPathFile($path_to_file)
    {
        return url($path_to_file);
    }

}