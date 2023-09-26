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

    public function send(): void
    {
        echo $this->content;
    }
}