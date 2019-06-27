<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ShoppingListBundle\Entity\allergens;


class DefaultController extends Controller
{
    /**
     * @Route("/",name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('ShoppingListBundle:index.html.twig');
    }
}
