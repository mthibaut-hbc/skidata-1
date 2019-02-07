<?php

declare(strict_types=1);

namespace Skidata\Dta\Security;

interface EncryptorInterface
{
    public function encrypt(array $data): string;
}
