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
        
        //twig/twig
        // $this->container->addShared('twig', function () {
        //     $loader = new FilesystemLoader(BASE_PATH."/templates");
        //     $twig = new Environment($loader, [
        //         'cache' => BASE_PATH."/templates",
        //     ]);
        //     return $twig;
        // });
    }
}

