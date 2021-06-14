<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseFormatter extends Controller
{
    protected static $response = [
        'meta' => [
            'code' => 200, 
            'status' => 'success',
            'message' => null
        ],
        'data' => null
    ];

    public static function success($message = null, $data = null){
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($message = null, $data = null, $code = 400){
        self::$response['meta']['message'] = $message;
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
