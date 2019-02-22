<?php

declare(strict_types=1);

namespace Skidata\Dta\Node\Order;

use DateTimeImmutable;
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

    public function permissionSerialNumber(): ?string
    {
        if (!$this->isSuccess()) {
            return null;
        }

        return $this->payload['PermissionSerialNumber'];
    }

    public function orderId(): ?string
    {
        if (!$this->isSuccess()) {
            return null;
        }

        return $this->payload['OrderId'];
    }

    public function contactId(): ?string
    {
        if (!$this->isSuccess()) {
            return null;
        }

        return $this->payload['ContactId'];
    }

    public function validFrom(): ?DateTimeImmutable
    {
        if (!$this->isSuccess()) {
            return null;
        }

        return new DateTimeImmutable($this->payload['ValidFrom']);
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
