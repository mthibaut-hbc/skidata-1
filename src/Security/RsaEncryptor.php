<?php

declare(strict_types=1);

namespace Skidata\Dta\Security;

use Nette\Utils\Json;
use Pikirasa\RSA;

final class RsaEncryptor implements EncryptorInterface
{
    /**
     * @var RSA
     */
    private $rsa;

    public function __construct(string $publicKey)
    {
        $this->rsa = new RSA(
            file_exists($publicKey) ? 'file://' . $publicKey : $publicKey
        );
    }

    public function encrypt(array $data): string
    {
        return $this->rsa->base64Encrypt(
            Json::encode($data)
        );
    }
}
