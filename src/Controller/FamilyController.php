<?php

namespace App\Controller;

use App\Entity\Family;
use App\Form\FamilyType;
use App\Repository\FamilyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/family')]
class FamilyController extends AbstractController
{
    #[Route('/', name: 'family_index', methods: ['GET'])]
    public function index(FamilyRepository $familyRepository): Response
    {
        return $this->render('family/index.html.twig', [
            'families' => $familyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'family_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserInterface $user): Response
    {
        $family = new Family();
        $family->setIdUser($this->getUser());
        $user->setNbBalls(6);
        $form = $this->createForm(FamilyType::class, $family);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($family);
            $entityManager->flush();

            return $this->redirectToRoute('info');
        }

        return $this->render('family/new.html.twig', [
            'family' => $family,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'family_show', methods: ['GET'])]
    public function show(Family $family): Response
    {
        return $this->render('family/show.html.twig', [
            'family' => $family,
        ]);
    }

    #[Route('/{id}/edit', name: 'family_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Family $family): Response
    {
        $form = $this->createForm(FamilyType::class, $family);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('family_index');
        }
        return $this->render('family/edit.html.twig', [
            'family' => $family,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'family_delete', methods: ['POST'])]
    public function delete(Request $request, Family $family): Response
    {
        if ($this->isCsrfTokenValid('delete'.$family->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($family);
            $entityManager->flush();
        }
        return $this->redirectToRoute('family_index');
    }
}
