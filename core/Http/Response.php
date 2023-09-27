<?php

namespace Core\Http;

use Core\Http\ResponseInterface;

class Response implements ResponseInterface
{
    public function __construct(
        private string $content = '',
        private int $status = 200,
        private array $headers = []
    )
    {
    }

    public function send()
    { 
        http_response_code($this->status);

        header("Content-Type: text/html");

        foreach ($this->headers as $header => $value) {
            header("{$header}: {$value}");
        }

        echo $this->content;
    }
}