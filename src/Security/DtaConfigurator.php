<?php

declare(strict_types=1);

namespace Skidata\Dta\Security;

use Nette\Utils\Strings;

final class DtaConfigurator implements ConfiguratorInterface
{
    /**
     * @var string
     */
    private $hostname;

    /**
     * @var string
     */
    private $identifier;

    public function __construct(string $hostname, string $identifier)
    {
        $this->hostname = $hostname;
        $this->identifier = $identifier;
    }

    public function recipient(string $service): string
    {
        return Strings::trim($this->hostname, '/').'/'.$service;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }
}
