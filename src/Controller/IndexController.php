<?php


namespace App\Controller;


use App\Entity\Room;
use App\Form\RoomType;
use App\Service\DateCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private const HOTEL_YEAR = 1989;
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(DateCalculator $calc) {
        $year = $calc->yearDiff(self::HOTEL_YEAR);

        $rep = $this->getDoctrine()->getRepository(Room::class);

        //$rooms = $rep->findAll();

        $rooms = $rep->findByPrice(300);

        return $this->render('index.html.twig',['title' => 'Hotel Pixelpro', 'year' => $year, 'rooms' => $rooms]);

    }

    /**
     * @Route("room/nuevo", name="room_nuevo")
     */
    public function new(Request $request){
        $room = new Room();

        $form = $this->createForm(RoomType::class, $room);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $room = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($room);

            $entityManager->flush();

            return $this->redirectToRoute('room_show',['id' => $room->getId()]);

        }

        return $this->render('new.html.twig', ['form' => $form->createView()]);

    }

    /**
     * @Route("room/{id}/show", name="room_show")
     */
    public function show($id) {

        $rep = $this->getDoctrine()->getRepository(Room::class);

        $rooms = $rep->find($id);

        return $this->render('show.html.twig',['rooms' => $rooms]);

    }
}