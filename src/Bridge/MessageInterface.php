<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

interface MessageInterface
{
    public function destination(): string;

    public function requirements(): string;

    public function parameters(): ?string;

    public function parametrize(string $parameters): void;
}
