<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

use Skidata\Dta\Security\ConfiguratorInterface;
use Skidata\Dta\Security\EncryptorInterface;

final class MessageBuilder implements MessageBuilderInterface
{
    /**
     * @var ConfiguratorInterface
     */
    private $configurator;

    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    public function __construct(ConfiguratorInterface $configurator, EncryptorInterface $encryptor)
    {
        $this->configurator = $configurator;
        $this->encryptor = $encryptor;
    }

    public function build(string $service, array $requirements, array $parameters): MessageInterface
    {
        $requirements['id'] = $this->configurator->identifier();
        $message = new Message(
            $this->configurator->destination($service),
            $this->encryptor->encrypt($requirements)
        );

        if ($parameters) {
            $message->parametrize(
                $this->encryptor->encrypt($parameters)
            );
        }

        return $message;
    }
}
