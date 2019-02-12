<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;
use Skidata\Dta\Node\ResponseInterface;

interface RequestBusInterface
{
    public function handle(RequestInterface $request): ResponseInterface;

    public function addEndpoint(string $requestClass, EndpointInterface $endpoint): void;
}
