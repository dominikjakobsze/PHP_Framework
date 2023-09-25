<?php

namespace Core\Container;


use Core\Container\ContainerInterface;
use Core\Exceptions\ContainerException;

class Container implements ContainerInterface
{

    private array $services = [];

    public function get(string $id): string|object
    {
        if(!$this->has($id)){
            $this->add($id);
        }
        return $this->services[$id];
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