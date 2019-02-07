<?php

declare(strict_types=1);

namespace Skidata\Dta\Feature;

interface RequestInterface
{
    public function source(): array;

    public function parameters(): array;
}
