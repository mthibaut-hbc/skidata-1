<?php

declare(strict_types=1);

namespace Skidata\Dta\Bridge;

final class Message implements MessageInterface
{
    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string
     */
    private $data;

    public function __construct(string $recipient, string $data)
    {
        $this->recipient = $recipient;
        $this->data = $data;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function data(): string
    {
//        $data = 'json=' . $this->encrypt($this->source);
//        if ($this->hasParameters()) {
//            $data .= '&parametr=' . $this->encrypt($this->parameters);
//        }
//
//        return $data;

        return $this->data;
    }
}
