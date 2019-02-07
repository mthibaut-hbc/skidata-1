<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;

interface StrategyInterface
{
    public function forRequest(RequestInterface $request): ?EndpointInterface;

    public function addEndpoint(string $requestClass, EndpointInterface $endpoint): void;
}
