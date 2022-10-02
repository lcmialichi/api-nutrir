<?php

namespace App\Exceptions;

use App\Enum\Http;

trait ExceptionTrait
{

    public function render()
    {
        return response()->json([
            "status" => false,
            "message" => $this->message,
            "errorType" => Http::tryFrom($this->code)->name
        ], $this->code);
    }
}
