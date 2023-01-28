<?php

function makeJson(int $status, string $message, $data){
    $json = [
        "status"=>$status,
        "message"=> $message,
        "data" => $data,
    ];

    return $json;
}

?>