<?php

header("Content-Type: application/json");
echo json_encode(
    [
        "stauts" => false,
        "message" => "rota nao encontrada!",
        "data" => [
            "errorType" => App\Enum\Http::tryFrom(404)->name
        ]
    ],
    JSON_UNESCAPED_SLASHES|
    JSON_PRETTY_PRINT
);
