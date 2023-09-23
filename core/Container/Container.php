<?php

namespace Core\Container;


use Core\Container\ContainerInterface;
use Core\Exceptions\ContainerException;

class Container implements ContainerInterface
{

    private array $services = [];

    public function get(string $id)
    {
        return new $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id,$this->services);
    }

    public function add(string $id, string|object $concrete = null)
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