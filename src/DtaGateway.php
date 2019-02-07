<?php

declare(strict_types=1);

namespace Skidata\Dta;

use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\ResponseInterface;

final class DtaGateway implements GatewayInterface
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function handle(RequestInterface $request): ResponseInterface
    {
        $endpoint = $this->strategy->forRequest($request);
        if (!$endpoint) {
            throw new MissingEndpointException($request);
        }

        return $endpoint->execute($request);
    }
}
