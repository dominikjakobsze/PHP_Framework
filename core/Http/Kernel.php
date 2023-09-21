<?php

namespace Core\Http;

use Core\Routing\Router;
use Exception;

class Kernel
{
    public function __construct(
        private Router $router
    )
    {
        
    }
    public function handle(Request $request): Response
    {
        try{
            dd($this->router);
        }catch(Exception $exception){
            dd($exception);
        }
    }
}