<?php

namespace App\Domain\Enum;

enum CodeEnum:int
{
    case NO_CONTENT = 204;
    case BAD_REQUEST = 400;
    case NOT_AUTHORIZATION = 401;
    case NOT_FOUND = 404;
    case INTERNAL_SERVER = 500;
}
