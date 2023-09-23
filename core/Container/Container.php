<?php

namespace Core\Container;


use Core\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private array $services = [];

    public function get(string $id)
    {
        return new $this->services[$id];
    }

    public function has(string $id): bool
    {

    }

    public function add(string $id, string|object $concrete = null)
    {
        if($concrete === null){
            if(!class_exists($id)) {
                
            }
            $concrete = $id;
        }
        $this->services[$id] = $concrete;
    }
}