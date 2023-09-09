<?php

namespace Core\Http;

class Response
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
        
    }
}