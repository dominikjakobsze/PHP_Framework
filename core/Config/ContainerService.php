<?php

namespace Core\Config;

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

        //services[RouterInterface::class] => Router::class
        $this->container->add(
            RouterInterface::class,
            Router::class
        );

        //services[Kernel::class] => Kernel::class((key)RouterInterface::class=>(Router::class))
        //RouterInterface::class === Router::class
        $this->container->add(
            Kernel::class,
            Kernel::class
        )
        ->addArgument(RouterInterface::class)
        ->addArgument($this->container);

        //twig/twig
        $this->container->addShared(FilesystemLoader::class)
        ->addArgument(new StringArgument(BASE_PATH."/templates"));

        $this->container->addShared(Environment::class)
        ->addArgument(FilesystemLoader::class);

        //twig/twig => when I ask about FilesystemLoader::class, I get new StringArgument(BASE_PATH."/templates")

        //it knows that to initialize Kernel::class, it needs to pass some object that
        //implements RouterInterface, but we binded before that every RouterInterface::class has to be
        //autowired as Router::class 

        //basically => when I ask about RouterInterface::class give me Router::class
    }
}

