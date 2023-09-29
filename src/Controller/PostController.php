<?php 

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Http\Response;

class PostController extends AbstractController
{
    public function create(): Response
    {
        return $this->renderTemplate(templatePath: 'create-post.html.twig', additionalArgs: ["test"=>"test"]);
    }
}