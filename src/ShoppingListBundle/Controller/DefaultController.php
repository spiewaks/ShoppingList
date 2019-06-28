<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="home")
     * @Template("@ShoppingList/Default/index.html.twig")
     */
    public function indexAction()
    {
        return [];
    }
}
