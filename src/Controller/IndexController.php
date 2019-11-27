<?php


namespace App\Controller;


use App\Entity\Room;
use App\Form\RoomType;
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

    /**
     * @Route("room/nuevo")
     */
    public function new(){
        $room = new Room();

        $form = $this->createForm(RoomType::class, $room);

        return $this->render('new.html.twig', ['form' => $form->createView()]);

    }
}