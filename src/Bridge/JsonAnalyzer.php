<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

final class JsonAnalyzer
{
    public function isJson($json): bool
    {
        return is_string($json) && is_array(json_decode($json, true)) && (JSON_ERROR_NONE === json_last_error()) ? true : false;
    }
}
