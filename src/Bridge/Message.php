<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

final class Message implements MessageInterface
{
    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $requirements;

    /**
     * @var string|null
     */
    private $parameters;

    public function __construct(string $destination, string $requirements)
    {
        $this->destination = $destination;
        $this->requirements = $requirements;
    }

    public function destination(): string
    {
        return $this->destination;
    }

    public function requirements(): string
    {
        return $this->requirements;
    }

    public function parameters(): ?string
    {
        if (!$this->parameters) {
            return null;
        }

        return base64_encode($this->parameters);
    }

    public function parametrize(string $parameters): void
    {
        $this->parameters = $parameters;
    }
}
