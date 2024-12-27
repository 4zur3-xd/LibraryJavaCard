<?php

namespace App\Helpers;

class ResponseHelper{


    public static function green($data = '')
    {
        return response()->json(
            [
                'status' => true,
                'data' => $data,
            ],
            200
        );
    }

    public static function red($msg = '')
    {
        return response()->json(
            [
                'status' => false,
                'msg' => $msg,
            ],
            400
        );
    }

}