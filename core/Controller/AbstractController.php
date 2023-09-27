<?php

namespace Core\Controller;

use Core\Http\Response;
use League\Container\Container;
use Twig\Environment;

abstract class AbstractController
{
    protected Container $container;
    protected Environment $twig;

    public function __construct()
    {
        //dd($GLOBALS);
        $this->container = $GLOBALS['container'];
        $this->twig = $this->container->get('twig');
        $this->setUp();
    }
    private function setUp()
    {
        $this->twig->addGlobal('global_backend_url', APP_BACKEND_URL);
        $this->twig->addGlobal('global_frontend_url', APP_FRONTEND_URL);
    }
    protected function renderTemplate(string $templatePath = "index.html", array $additionalArgs = []): Response
    {
        return new Response(
            content: $this->twig->render($templatePath, $additionalArgs),
            status: 200,
            headers: []
        );
    }
}