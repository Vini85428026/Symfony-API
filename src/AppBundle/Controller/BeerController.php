<?php
/**
 * Created by PhpStorm.
 * User: vinicius
 * Date: 15/05/18
 * Time: 08:40
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/beers")
 */
class BeerController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(){
        $beers = $this->getDoctrine()->getRepository('AppBundle:Beers')->findAll();

        return new JsonResponse($beers);
    }
}