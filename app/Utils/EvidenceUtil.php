<?php
/**
 * Created by PhpStorm.
 * User: AkhmadFauzie
 * Date: 2019-03-06
 * Time: 2:55 PM
 */

namespace App\Utils;


class EvidenceUtil
{

    public const SIGN_PICTURE = "images/sign-picture/";
    public const RECEIPT_PICTURE = "images/receipt-picture/";
    public const TRANSFER_EVIDENCE = "images/transfer-evidence/";

    public static function getFullEvidenceSign($name)
    {
        return self::SIGN_PICTURE . $name;
    }

    public static function getFullEvidenceReceipt($name)
    {
        return self::RECEIPT_PICTURE . $name;
    }

    public static function getFullEvidenceTransfer($name)
    {
        return self::TRANSFER_EVIDENCE . $name;
    }

    public static function getFullEvidenceFile($path_to_file)
    {
        return url($path_to_file);
    }

}