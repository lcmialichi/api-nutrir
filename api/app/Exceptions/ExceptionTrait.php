<?php

namespace App\Exceptions;

use Laravel\Lumen\Http\Request;

trait ExceptionTrait
{

    public function render(Request $request)
    {
        return response()
            ->json(
                [
                    "status" => false,
                    "message" => $this->getMessage()
                ],
                $this->getCode()
            );
    }
}
