<?php

declare(strict_types=1);

namespace Skidata\Dta\Security;

interface ConfiguratorInterface
{
    public function destination(string $service): string;

    public function identifier(): string;
}
