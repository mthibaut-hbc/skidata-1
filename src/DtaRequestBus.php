<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;
use Skidata\Dta\Node\ResponseInterface;

final class DtaRequestBus implements RequestBusInterface
{
    /**
     * @var EndpointInterface[]
     */
    private $endpoints;

    public function handle(RequestInterface $request): ResponseInterface
    {
        foreach ($this->endpoints as $requestClass => $endpoint) {
            if (get_class($request) !== $requestClass) {
                continue;
            }

            return $endpoint->execute($request);
        }

        throw new MissingEndpointException($request);
    }

    public function addEndpoint(string $requestClass, EndpointInterface $endpoint): void
    {
        $this->endpoints[$requestClass] = $endpoint;
    }
}
