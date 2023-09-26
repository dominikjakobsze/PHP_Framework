<?php

namespace Core\Config;

use Core\Http\Kernel;
use Core\Routing\Router;
use Core\Routing\RouterInterface;
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

        $this->container->addShared(
            RouterInterface::class,
            Router::class
        );
        //basically => when I ask about RouterInterface::class give me Router::class

        $this->container->addShared(
            Kernel::class,
            Kernel::class
        )
        ->addArgument(RouterInterface::class)
        ->addArgument($this->container);

        $this->container->addShared(FilesystemLoader::class)->addArgument(BASE_PATH."/templates");
        $this->container->addShared('twig',Environment::class)->addArgument(FilesystemLoader::class);
    }
}

