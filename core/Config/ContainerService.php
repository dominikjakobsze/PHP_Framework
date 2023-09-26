<?php

namespace Core\Config;

use Core\Controller\AbstractController;
use Core\Http\Kernel;
use Core\Routing\Router;
use Core\Routing\RouterInterface;
use League\Container\Argument\Literal\StringArgument;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ContainerService
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function getContainer()
    {
        $this->registerContainerServices();
        return $this->container;
    }
    private function registerContainerServices()
    {
        
        $this->container->delegate(new ReflectionContainer(true));

        $this->container->add(
            RouterInterface::class,
            Router::class
        );
        //basically => when I ask about RouterInterface::class give me Router::class

        $this->container->add(
            Kernel::class,
            Kernel::class
        )
        ->addArgument(RouterInterface::class)
        ->addArgument($this->container);

        //twig/twig
        $this->container->addShared(FilesystemLoader::class)
        ->addArgument(new StringArgument(BASE_PATH."/templates"));
        //->addArgument -> bind to __construct parameter

        $this->container->addShared(Environment::class)
        ->addArgument(FilesystemLoader::class);

        //AbstractController
        $this->container->addShared(AbstractController::class)
        ->addArgument($this->container);
    }
}

