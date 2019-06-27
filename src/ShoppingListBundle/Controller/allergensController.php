<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
Use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ShoppingListBundle\Entity\allergens;

class allergensController extends Controller
{
    /**
     * @Route("/addAllergen", name="addallergen", methods={"POST"})
     * @Template("@ShoppingList/allergens/add_allergen.html.twig")
     */
    public function addAllergenAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $allergen = new allergens();
        $allergen->setName ($request->request->get('name'));
        $em->persist($allergen);
        $em->flush();
        $url = $this->generateUrl('showallergens', ['id'=>$allergen->getId()]);
        return $this->redirect($url);
       // return new Response('alergen dodany ! ');
    }

    /**
     * @Route("/showAllAllergens", name="showallalergens")
     * @Template("@ShoppingList/allergens/show_all_allergens.html.twig")
     */
    public function showAllAllergensAction()
    {
        return $this->render('ShoppingListBundle:allergens:show_all_allergens.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/removeAllergen/{id}", name="removeAllergen", methods={"POST"})
     */
    public function removeAllergenAction($id)
    {
        return $this->render('ShoppingListBundle:allergens:remove_allergen.html.twig', array(
            // ...
        ));
    }

}
