<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class productsController extends Controller
{
    /**
     * @Route("/showAll", name="showall")
     */
    public function showAllAction()
    {
        return $this->render('ShoppingListBundle:products:show_all.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/addNew", name="addnew", methods={"POST"})
     */
    public function addNewAction()
    {
        return $this->render('ShoppingListBundle:products:add_new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeProduct", name="removeproduct", methods={"POST"})
     */
    public function removeProductAction()
    {
        return $this->render('ShoppingListBundle:products:remove_product.html.twig', array(
            // ...
        ));
    }

}
