<?php

declare(strict_types=1);

namespace Skidata\Dta\Node\Order;

use Skidata\Dta\Bridge\PayloadInterface;
use Skidata\Dta\Node\ResponseInterface;

final class CreateOrderResponse implements ResponseInterface
{
    /**
     * @var array
     */
    private $payload;

    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload->asArray();
    }

    public function isSuccess(): bool
    {
        return !key_exists('Report', $this->payload);
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
