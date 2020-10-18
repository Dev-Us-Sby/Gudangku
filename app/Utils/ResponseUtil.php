<?php
/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-06
 * Time: 2:55 PM
 */

namespace App\Utils;


use Illuminate\Pagination\LengthAwarePaginator;

class ResponseUtil
{

    public static function simpleMessage($message, $status = 200)
    {
        return response(['message' => $message], $status);
    }

    public static function messageWithPayload($message, $payload = null, $status = 200)
    {
        return response([
            'message' => $message,
            'payload' => $payload
        ], $status);
    }

    public static function paging(LengthAwarePaginator $paginator, $status = 200)
    {
        return response($paginator, $status);
    }

}