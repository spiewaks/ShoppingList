<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class shoppinglistController extends Controller
{
    /**
     * @Route("/addToList")
     */
    public function addToListAction()
    {
        return $this->render('ShoppingListBundle:shoppinglist:add_to_list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/saveList")
     */
    public function saveListAction()
    {
        return $this->render('ShoppingListBundle:shoppinglist:save_list.html.twig', array(
            // ...
        ));
    }

}
