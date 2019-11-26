<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(LoggerInterface $logger) {
        $logger->info('Página cargada!');
        return $this->render('index.html.twig',['title' => 'Hotel Pixelpro']);

    }

}