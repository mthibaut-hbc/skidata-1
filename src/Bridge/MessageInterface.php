<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

interface MessageInterface
{
    public function recipient(): string;

    public function data(): string;
}
