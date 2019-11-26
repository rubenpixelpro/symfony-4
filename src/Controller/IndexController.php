<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(Environment $twig) {
        $html = $twig->render('index.html.twig',['title' => 'Hotel Pixelpro']);

        return new Response($html);
    }

}