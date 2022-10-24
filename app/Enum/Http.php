<?php

namespace App\Enum;

enum Http: int {
    case OK = 200;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHODE_NOT_ALOWED = 405;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_ERROR = 500;
}