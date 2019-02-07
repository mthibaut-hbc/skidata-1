<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

interface MessageBuilderInterface
{
    public function build(string $service, array $source, array $parameters): MessageInterface;
}
