<?php

function withSuccess(mixed $data, string $message = null): object
{
    return customResponse($data, true, 200, $message);
}

function withError(string $message, int $status, mixed $data = null): object
{
    return customResponse($data, false, $status, $message);
}
function with422Error(string $message, $data = null): object
{
    return customResponse($data, false, 422, ['body' => [$message]]);
}
function customResponse(mixed $data, bool $success, int $status, mixed $message = null): object
{
    return response()->json([
        'json_data' => $data,
        'success' => $success,
        'status' => $status,
        'message' => $message,
    ], $status);
}
