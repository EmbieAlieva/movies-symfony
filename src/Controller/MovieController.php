<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/movies")
 */
class MovieController extends AbstractController {

    /**
     * Lists all offer entities from logged in User
     * @Route("/", name="movies_index"), methods={"GET"} )
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        // Get all the movies that the logged user add on his movies list
        $loggedin_username = is_null($request->getSession()->get(Security::LAST_USERNAME)) ? $request->getSession()->get('user') : $request->getSession()->get(Security::LAST_USERNAME);
        $movies = $em->getRepository('App:Movie')->findMuviesFromUser($loggedin_username);

        return $this->render('movies/index.html.twig', array(
                    'movies' => $movies,
        ));
    }

}
