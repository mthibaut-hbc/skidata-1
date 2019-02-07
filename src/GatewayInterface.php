<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\ResponseInterface;

interface GatewayInterface
{
    public function handle(RequestInterface $request): ResponseInterface;
}
