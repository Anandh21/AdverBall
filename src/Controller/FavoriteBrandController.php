<?php

namespace App\Controller;

use App\Entity\FavoriteBrand;
use App\Form\FavoriteBrandType;
use App\Repository\FavoriteBrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/favorite/brand')]
class FavoriteBrandController extends AbstractController
{
    #[Route('/', name: 'favorite_brand_index', methods: ['GET'])]
    public function index(FavoriteBrandRepository $favoriteBrandRepository): Response
    {
        return $this->render('favorite_brand/index.html.twig', [
            'favorite_brands' => $favoriteBrandRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'favorite_brand_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $favoriteBrand = new FavoriteBrand();
        $form = $this->createForm(FavoriteBrandType::class, $favoriteBrand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($favoriteBrand);
            $entityManager->flush();

            return $this->redirectToRoute('favorite_brand_index');
        }

        return $this->render('favorite_brand/new.html.twig', [
            'favorite_brand' => $favoriteBrand,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'favorite_brand_show', methods: ['GET'])]
    public function show(FavoriteBrand $favoriteBrand): Response
    {
        return $this->render('favorite_brand/show.html.twig', [
            'favorite_brand' => $favoriteBrand,
        ]);
    }

    #[Route('/{id}/edit', name: 'favorite_brand_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FavoriteBrand $favoriteBrand): Response
    {
        $form = $this->createForm(FavoriteBrandType::class, $favoriteBrand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favorite_brand_index');
        }

        return $this->render('favorite_brand/edit.html.twig', [
            'favorite_brand' => $favoriteBrand,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'favorite_brand_delete', methods: ['POST'])]
    public function delete(Request $request, FavoriteBrand $favoriteBrand): Response
    {
        if ($this->isCsrfTokenValid('delete'.$favoriteBrand->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($favoriteBrand);
            $entityManager->flush();
        }

        return $this->redirectToRoute('favorite_brand_index');
    }
}