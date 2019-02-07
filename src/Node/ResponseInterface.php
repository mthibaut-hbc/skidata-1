<?php

declare(strict_types=1);

namespace Skidata\Dta\Node;

interface ResponseInterface
{
    public function isSuccess(): bool;

    public function payload(): array;
}
