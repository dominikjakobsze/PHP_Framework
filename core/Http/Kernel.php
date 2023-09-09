<?php

namespace Core\Http;

class Kernel
{
    public function handle(Request $request): Response
    {
        return new Response(content: '<h1>Hello</h1>', status: 404, headers: []);
    }
}