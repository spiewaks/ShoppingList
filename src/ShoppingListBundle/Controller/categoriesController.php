<?php

namespace ShoppingListBundle\Controller;

use ShoppingListBundle\Entity\allergens;
use ShoppingListBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class categoriesController extends Controller
{
    /**
     * @Route("/addCategory",name="addcategory", methods="POST")
     * @Route("/addCategory",name="newcategory", methods="GET")
     * @Template("@ShoppingList/categories/add_category.html.twig")
     */
    public function addCategoryAction(Request $request)
    {
        $category = new Categories();
        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class)
            ->add('description',TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Dodaj nowy alergen'])
            ->getForm();
        return ['form' => $form->createView()];
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('task_success');
        }
    }

    /**
     * @Route("/showAllCategories", name="showallcategories")
     * @Template("@ShoppingList/categories/show_all_categories.html.twig")
     */
    public function showAllCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ShoppingListBundle:Categories');
        $categories = $repository->findAll();

        return ['categories'=>$categories];
    }

    /**
     * @Route("/removeCategory/{id}", name="removecategory")
     */
    public function removeCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ListaZakupowBundle:Categories');
        $category = $repository->find($id);
        if (! $category) {
            return new Response('Kategoria o podanym ID nie istnieje');
        }
        $em->remove($category);
        $em->flush();
        return new Response('Kategoria została usunięta');
    }

}
