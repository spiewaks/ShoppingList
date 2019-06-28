<?php

namespace ShoppingListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

Use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ShoppingListBundle\Entity\allergens;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class allergensController extends Controller
{
    /**
     * @Route("/addAllergen", name="addallergen", methods="POST")
     * @Route("/addAllergen", name="newAllergen", methods="GET")
     * @Template("@ShoppingList/allergens/add_allergen.html.twig")
     */
    public function addAllergenAction(Request $request)
    {

        $allergen = new allergens();
        $form = $this->createFormBuilder($allergen)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Dodaj nowy alergen'])
            ->getForm();
        return ['form' => $form->createView()];
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $allergen = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($allergen);
            $em->flush();
            return $this->redirectToRoute('task_success');
        }
    }

    /**
     * @Route("/showAllAllergens", name="showAllAlergens")
     * @Route("/backToAllergens", name="backallergens")
     * @Route("/showallalergensfromindex", name="showallallergensfromindex")
     * @Template("@ShoppingList/allergens/show_all_allergens.html.twig")
     */
    public function showAllAllergensAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ShoppingListBundle:allergens');
        $allergens = $repository->findAll();

        return ['allergens'=>$allergens];
    }

    /**
     * @Route("/removeAllergen/{id}", name="removeAllergen", methods={"POST"})
     * @Route("/removeAllergen", name="removeA")

     * @Template("@ShoppingList/allergens/remove_allergen.html.twig")
     */
    public function removeAllergenAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('ShoppinglistBundle:allergens');
        $allergen = $repository->find($id);
        if (!$allergen) {
            return new Response('Allergen o podanym ID nie istnieje');
        }
        $em->remove($allergen);
        $em->flush();
        return new Response('alergen został usunięty');
    }
}
