<?php

declare(strict_types=1);

namespace Skidata\Dta\Feature;

final class CreateOrderRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $ticketId;

    /**
     * @var string
     */
    private $chipId;

    /**
     * @var string
     */
    private $ageCategoryId;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $amount;

    public function __construct(string $firstName, string $lastName, string $ticketId, string $chipId, string $ageCategoryId, float $price, int $amount = 1)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->ticketId = $ticketId;
        $this->chipId = $chipId;
        $this->ageCategoryId = $ageCategoryId;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function source(): array
    {
        return [];
    }

    public function parameters(): array
    {
        return [
            'FirstName' => $this->firstName,
            'LastName' => $this->lastName,
            'BirthDate' => null,
            'Chip' => $this->chipId,
            'ContactId' => null,
            'Amount' => $this->amount,
            'Unit' => 'Day',
            'ProductId' => $this->ticketId,
            'ConsumerCategoryId' => $this->ageCategoryId,
            'Price' => $this->price,
            'ValidFrom' => null,
            'CurrencyCode' => 'EUR',
        ];
    }
}
