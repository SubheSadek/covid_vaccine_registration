<?php

function withSuccess($data = null, $message = null)
{
    return customResponse($data, true, 200, $message);
}

function withError($message, $status, $data = null)
{
    return customResponse($data, false, $status, $message);
}
function with422Error($message, $data = null)
{
    return customResponse($data, false, 422, ['body' => [$message]]);
}
function customResponse($data, $success, $status, $message = null)
{
    return response()->json([
        'json_data' => $data,
        'success' => $success,
        'status' => $status,
        'message' => $message,
    ], $status);
}
