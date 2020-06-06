<?php

namespace App\Controller;

use App\Entity\HopQuantity;
use App\Form\HopQuantityType;
use App\Repository\HopQuantityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hop/quantity")
 */
class HopQuantityController extends AbstractController
{
    /**
     * @Route("/", name="hop_quantity_index", methods={"GET"})
     */
    public function index(HopQuantityRepository $hopQuantityRepository): Response
    {
        return $this->render('hop_quantity/index.html.twig', [
            'hop_quantities' => $hopQuantityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hop_quantity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hopQuantity = new HopQuantity();
        $form = $this->createForm(HopQuantityType::class, $hopQuantity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hopQuantity);
            $entityManager->flush();

            return $this->redirectToRoute('hop_quantity_index');
        }

        return $this->render('hop_quantity/new.html.twig', [
            'hop_quantity' => $hopQuantity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hop_quantity_show", methods={"GET"})
     */
    public function show(HopQuantity $hopQuantity): Response
    {
        return $this->render('hop_quantity/show.html.twig', [
            'hop_quantity' => $hopQuantity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hop_quantity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HopQuantity $hopQuantity): Response
    {
        $form = $this->createForm(HopQuantityType::class, $hopQuantity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hop_quantity_index');
        }

        return $this->render('hop_quantity/edit.html.twig', [
            'hop_quantity' => $hopQuantity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hop_quantity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HopQuantity $hopQuantity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hopQuantity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hopQuantity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hop_quantity_index');
    }
}
