<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function homepage() {
        return new Response("<h1>Mi primera página con Symfony 4</h1>");
    }

}