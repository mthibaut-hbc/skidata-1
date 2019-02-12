<?php

declare(strict_types=1);

namespace Skidata\Dta\Node;

use InvalidArgumentException;
use Skidata\Dta\Feature\RequestInterface;

final class UnknownRequestException extends InvalidArgumentException
{
    public function __construct(EndpointInterface $endpoint, RequestInterface $unknownRequest, string $expectedRequestClass)
    {
        $endpointClass = get_class($endpoint);
        $unknownRequestClass = get_class($unknownRequest);

        parent::__construct(
            sprintf('The endpoint %s expectes the %s request, %s given.', $endpointClass, $unknownRequestClass, $expectedRequestClass)
        );
    }
}
