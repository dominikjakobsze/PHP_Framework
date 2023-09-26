<?php

namespace Core\Http;

use Core\Http\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    public function __construct(
        private array $content = [],
        private int $status = 200,
        private array $headers = []
    )
    {
    }

    public function send(): void
    {
        header('Content-Type: application/json');

        http_response_code($this->status);

        foreach ($this->headers as $header => $value) {
            header("{$header}: {$value}");
        }

        echo json_encode([
            "content" => $this->content,
            "http_code" => $this->status
        ]);
    }
}