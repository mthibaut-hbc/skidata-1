<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

interface TransceiverInterface
{
    public function process(MessageInterface $message): PayloadInterface;
}
