<?php

declare(strict_types=1);

namespace Skidata\Dta\Node\Chip;

use Skidata\Dta\Bridge\MessageBuilderInterface;
use Skidata\Dta\Bridge\TransceiverInterface;
use Skidata\Dta\Feature\RequestInterface;
use Skidata\Dta\Node\EndpointInterface;
use Skidata\Dta\Node\ResponseInterface;

final class ValidateChipEndpoint implements EndpointInterface
{
    /**
     * @var string
     */
    private const SERVICE = 'chip.php';

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
        $message = $this->messageBuilder->build(
            self::SERVICE,
            $request->source(),
            $request->parameters()
        );

        return new ValidateChipResponse(
            $this->transceiver->process($message)
        );
    }
}
