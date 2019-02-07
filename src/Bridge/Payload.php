<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

use Nette\Utils\Json;

final class Payload implements PayloadInterface
{
    /**
     * @var array
     */
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = Json::decode($payload, Json::FORCE_ARRAY);
    }

    public function asArray(): array
    {
        return $this->payload;
    }
}
