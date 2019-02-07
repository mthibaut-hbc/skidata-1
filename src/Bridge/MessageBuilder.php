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

    public function build(string $service, array $source, array $parameters): MessageInterface
    {
        $source['id'] = $this->configurator->identifier();

        $fields = 'json='.$this->encryptor->encrypt($source);
        if ($parameters) {
            $fields .= 'parametr='.$this->encryptor->encrypt($parameters);
        }

        return new Message($this->configurator->recipient($service), $fields);
    }
}
