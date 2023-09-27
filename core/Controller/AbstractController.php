<?php

namespace Core\Controller;

use Core\Http\Response;
use League\Container\Container;

abstract class AbstractController
{
    protected Container $container;

    public function __construct()
    {
        //dd($GLOBALS);
        $this->container = $GLOBALS['container'];
    }
    protected function renderTemplate(string $templatePath = "index.html", array $additionalArgs = []): Response
    {
        return new Response(
            content: ($this->container->get('twig'))->render($templatePath, $additionalArgs),
            status: 200,
            headers: []
        );
    }
}