<?php

declare(strict_types=1);

namespace Skidata\Dta\Node\Order;

use Skidata\Dta\Bridge\MessageBuilderInterface;
use Skidata\Dta\Bridge\TransceiverInterface;
use Skidata\Dta\Feature\CreateOrderRequest;
use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;
use Skidata\Dta\Node\ResponseInterface;
use Skidata\Dta\Node\UnknownRequestException;

final class CreateOrderEndpoint implements EndpointInterface
{
    /**
     * @var string
     */
    private const SERVICE = 'order_new.php';

    /**
     * @var MessageBuilderInterface
     */
    private $messageBuilder;

    /**
     * @var TransceiverInterface
     */
    private $transceiver;

    public function __construct(MessageBuilderInterface $messageBuilder, TransceiverInterface $transceiver)
    {
        $this->messageBuilder = $messageBuilder;
        $this->transceiver = $transceiver;
    }

    public function execute(RequestInterface $request): ResponseInterface
    {
        if (!$request instanceof CreateOrderRequest) {
            throw new UnknownRequestException($this, $request, CreateOrderRequest::class);
        }

        $message = $this->messageBuilder->build(self::SERVICE, $request->source(), $request->parameters());

        return new CreateOrderResponse(
            $this->transceiver->process($message)
        );
    }
}
