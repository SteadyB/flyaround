<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10/05/18
 * Time: 11:54
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Review;



class ReviewController extends Controller
{

    /**
     * Lists all reviews entities.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/review/", name="review_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', ['reviews' => $reviews]);
    }

    /**
     * adding new review form
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/review/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        $review = new review();
        $form = "future requete de creation de formulaire";

        return $this->render('review/new.html.twig', [
            'review' => $review,
            'form' => $form,
        ]);
    }
}