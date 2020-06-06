<?php

namespace App\Controller;

use App\Entity\MaltQuantity;
use App\Form\MaltQuantityType;
use App\Repository\MaltQuantityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/malt/quantity")
 */
class MaltQuantityController extends AbstractController
{
    /**
     * @Route("/", name="malt_quantity_index", methods={"GET"})
     */
    public function index(MaltQuantityRepository $maltQuantityRepository): Response
    {
        return $this->render('malt_quantity/index.html.twig', [
            'malt_quantities' => $maltQuantityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="malt_quantity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $maltQuantity = new MaltQuantity();
        $form = $this->createForm(MaltQuantityType::class, $maltQuantity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maltQuantity);
            $entityManager->flush();

            return $this->redirectToRoute('malt_quantity_index');
        }

        return $this->render('malt_quantity/new.html.twig', [
            'malt_quantity' => $maltQuantity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="malt_quantity_show", methods={"GET"})
     */
    public function show(MaltQuantity $maltQuantity): Response
    {
        return $this->render('malt_quantity/show.html.twig', [
            'malt_quantity' => $maltQuantity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="malt_quantity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaltQuantity $maltQuantity): Response
    {
        $form = $this->createForm(MaltQuantityType::class, $maltQuantity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('malt_quantity_index');
        }

        return $this->render('malt_quantity/edit.html.twig', [
            'malt_quantity' => $maltQuantity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="malt_quantity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaltQuantity $maltQuantity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maltQuantity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maltQuantity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('malt_quantity_index');
    }
}
