<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;

final class EndpointStrategy implements StrategyInterface
{
    /**
     * @var EndpointInterface[]
     */
    private $endpoints;

    public function forRequest(RequestInterface $request): ?EndpointInterface
    {
        $requestClass = get_class($request);
        if (!key_exists($requestClass, $this->endpoints)) {
            return null;
        }

        return $this->endpoints[$requestClass];
    }

    public function addEndpoint(string $requestClass, EndpointInterface $endpoint): void
    {
        $this->endpoints[$requestClass] = $endpoint;
    }
}
