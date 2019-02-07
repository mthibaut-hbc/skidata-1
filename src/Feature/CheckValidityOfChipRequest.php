<?php

declare(strict_types=1);

namespace Skidata\Dta\Feature;

final class CheckValidityOfChipRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $chipId;

    public function __construct(string $chipId)
    {
        $this->chipId = $chipId;
    }

    public function source(): array
    {
        return [
            'chip' => $this->chipId,
        ];
    }

    public function parameters(): array
    {
        return [];
    }
}
