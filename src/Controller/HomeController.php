<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends  AbstractController
{
    /*#[Route('/', name:'home')]
    public function index(): Response
    {
        return  $this->render('pages/home.html.twig');
    }*/

    #[Route('/', name:'home', methods: ['GET','POST'])]
    public function new(Request $request, UserPasswordHasherInterface $passwordhasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            //entre la récupération des champs pour faire le nouveau User et sa sauvegarde (persist), on hashe le mot de passe
            $plainpass = $user->getPassword();
            $user->setPassword($passwordhasher->hashPassword($user, $plainpass));
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('pages/home.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/game', name: 'game')]
    public function game()
    {
        return $this->render('pages/game.html.twig');
    }

}