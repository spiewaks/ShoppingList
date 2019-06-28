<?php

namespace ShoppingListBundle\Controller;

use ShoppingListBundle\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Collections\ArrayCollection;


class productsController extends Controller
{
    /**
     * @Route("/showAll", name="showall")
     */
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ListaZakupowBundle:Products');

        $products = $repository->findAll();

        return ['products'=>$products];
    }

    /**
     * @Route("/addNew", name="addnew", methods={"POST"})
     * @Route("/addNew", name="newproduct", methods={"GET"})
     * @Template("@ShoppingList/products/add_new.html.twig")
     */
    public function addNewAction(Request $request)
    {
        $product = new Products();
        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Dodaj nowy produkt'])
            ->getForm();
        return ['form' => $form->createView()];
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('task_success');
        }

    }

    /**
     * @Route("/removeProduct/{id}", name="removeproduct", methods={"POST"})
     */
    public function removeProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ListaZakupowBundle:Products');
        $product = $repository->find($id);
        if (! $product) {
            return new Response('Produkt o podanym ID nie istnieje !');
        }
        $em->remove($product);
        $em->flush();
        return new Response('Produkt został usunięty !');
    }

}
