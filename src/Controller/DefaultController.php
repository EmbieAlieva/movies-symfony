<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Movie;

class DefaultController extends AbstractController {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $movies = $this->getDoctrine()
                ->getRepository(Movie::class)
                ->findAllActive();
        return $this->render('default/index.html.twig', array(
                    'movies' => $movies,
        ));
    }

}
