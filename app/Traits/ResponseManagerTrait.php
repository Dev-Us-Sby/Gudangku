<?php
/**
 * Created by PhpStorm.
 * User: Diandraa
 * Date: 2019-03-12
 * Time: 1:27 AM
 */

namespace App\Traits;


trait ResponseManagerTrait
{

    public function simpleMessage($message, $code = 200)
    {
        return response([
            'message' => $message
        ], $code);
    }

    public function payloadMessage($message, $payload, $code = 200)
    {
        return response([
            'message' => $message,
            'payload' => $payload
        ], $code);
    }

}