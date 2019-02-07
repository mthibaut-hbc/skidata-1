<?php

declare(strict_types=1);

namespace Skidata\Dta\Node;

use Skidata\Dta\Feature\RequestInterface;

interface EndpointInterface
{
    public function execute(RequestInterface $request): ResponseInterface;
}
