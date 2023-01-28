<?php

function makeJson(string $message, $data)
{
    $json = [
        "message" => $message,
        "data" => $data,
    ];

    return $json;
}
