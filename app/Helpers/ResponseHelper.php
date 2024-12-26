<?php

namespace App\Helpers;

class ResponseHelper{


    public static function green($msg = '', $data = '')
    {
        return response()->json(
            [
                'msg' => $msg,
                'data' => $data,
            ],
            200
        );
    }

    public static function red($msg = '')
    {
        return response()->json(
            [
                'msg' => $msg,
            ],
            400
        );
    }

}