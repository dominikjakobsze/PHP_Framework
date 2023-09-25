<?php

namespace Core\Container;


use Core\Container\ContainerInterface;
use Core\Exceptions\ContainerException;
use ReflectionClass;

class Container implements ContainerInterface
{

    private array $services = [];

    public function get(string $id): string|object
    {
        if(!$this->has($id)){
            $this->add($id);
        }

        $resolvedObject = $this->resolve($this->services[$id]);

        return $resolvedObject;
    }

    private function resolve(string $objectToResolve): string|object
    {
        $reflectionObject = new ReflectionClass($objectToResolve);

        $reflectionObjectConstructor = $reflectionObject->getConstructor();

        if($reflectionObjectConstructor === null){
            return $reflectionObject->newInstance();
        }

        $reflectionObjectConstructorParams = $reflectionObjectConstructor->getParameters();

        $refectionObjectConstructorDependencies = $this->resolveObjectDependencies($reflectionObjectConstructorParams);

        return $reflectionObject->newInstanceArgs($refectionObjectConstructorDependencies);
    }

    private function resolveObjectDependencies(array $dependenciesToResolve)
    {
        $resolvedDependencies = [];
        foreach($dependenciesToResolve as $dependency){
            $service = $this->get($dependency->getType()->getName());
            $resolvedDependencies[] = $service;
        }
        return $resolvedDependencies;
    }

    public function has(string $id): bool
    {
        return array_key_exists($id,$this->services);
    }

    public function add(string $id, string|object $concrete = null): void
    {
        if($concrete === null){
            if(!class_exists($id)) {
                throw new ContainerException();
            }
            $concrete = $id;
        }
        $this->services[$id] = $concrete;
    }
}