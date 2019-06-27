<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ShoppingListBundle\Entity\allergens;

class categoriesController extends Controller
{
    /**
     * @Route("/addCategory",name="addcategory")
     * @Template("@ShoppingList/categories/add_category.html.twig")
     */
    public function addCategoryAction()
    {
        return $this->render('ShoppingListBundle:categories:add_category.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/showAllCategories", name="showallcategories")
     * @Template("@ShoppingList/categories/show_all_categories.html.twig")
     */
    public function showAllCategoriesAction()
    {
        return $this->render('ShoppingListBundle:categories:show_all_categories.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeCategory", name="removecategory")
     */
    public function removeCategoryAction()
    {
        return $this->render('ShoppingListBundle:categories:remove_category.html.twig', array(
            // ...
        ));
    }

}
