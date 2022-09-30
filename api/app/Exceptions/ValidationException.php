<?php

namespace App\Exceptions;

class ValidationException extends \Exception {

    public function render(){
        
        return response()->json([
            "status" => false,
            "message" => $this->message
        ], 422);

    }
}