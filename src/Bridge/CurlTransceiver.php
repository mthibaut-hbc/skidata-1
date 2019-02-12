<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

use RuntimeException;

final class CurlTransceiver implements TransceiverInterface
{
    public function process(MessageInterface $message): PayloadInterface
    {
        $data = 'json=' . $message->requirements();
        if ($message->parameters()) {
            $data .= '&parametr=' . $message->parameters();
        }

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $message->destination());
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1000);

        $result = curl_exec($curl);
        if (!is_string($result)) {
            throw new RuntimeException();
        }

        curl_close($curl);

        return new Payload($result);
    }
}
