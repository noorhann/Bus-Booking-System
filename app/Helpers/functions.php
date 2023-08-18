<?php

if (!function_exists('apiResponse')) {
    /**
     * @param $success
     * @param $message
     * @param null $data
     * @return json
     */
    function apiResponse($success, $message, $statusCode, $data = null)
    {
        $response =  [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
    }
}


