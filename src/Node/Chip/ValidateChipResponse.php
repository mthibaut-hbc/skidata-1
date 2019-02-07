<?php

declare(strict_types=1);

namespace Skidata\Dta\Node\Chip;

use Skidata\Dta\Bridge\PayloadInterface;
use Skidata\Dta\Node\ResponseInterface;

final class ValidateChipResponse implements ResponseInterface
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
        return key_exists('Report', $this->payload) && 'OK' === $this->payload['Report'];
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
