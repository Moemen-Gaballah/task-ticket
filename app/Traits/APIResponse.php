<?php

namespace App\Traits;

trait APIResponse
{
    public function sendResponse($data, $message = null, $status_code = 200)
    {
        $response = [
            'status_code' => $status_code,
            'data'    => $data,
            'message' => $message,
        ];


        return response()->json($response);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = null, $status_code = 400)
    {
        $response = [
            'status_code' => $status_code,
            'message' => $error,
            'data' => $errorMessages
        ];

        return response()->json($response, $status_code);
    }
}
