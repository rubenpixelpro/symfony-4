<?php


namespace App\Controller;


use App\Service\DateCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private const HOTEL_YEAR = 1989;
    /**
     * @Route("/")
     */
    public function homepage(DateCalculator $calc) {
        $year = $calc->yearDiff(self::HOTEL_YEAR);
        return $this->render('index.html.twig',['title' => 'Hotel Pixelpro', 'year' => $year]);

    }

}