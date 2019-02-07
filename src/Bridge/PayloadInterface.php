<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

interface PayloadInterface
{
    public function asArray(): array;
}
