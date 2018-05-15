<?php
/**
 * Created by PhpStorm.
 * User: vinicius
 * Date: 15/05/18
 * Time: 08:40
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Beer;

/**
 * @Route("/beers")
 */
class BeerController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction(){
        $beers = $this->getDoctrine()->getRepository('AppBundle:Beer')->findAll();

        $beers = $this->get('jms_serializer')->serialize($beers, 'json');

        return new Response($beers);
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getAction(Beer $id){
        $beer = $this->get('jms_serializer')->serialize($id, 'json');

        return new Response($beer);
    }
}