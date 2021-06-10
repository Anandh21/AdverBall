<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class InfoController extends AbstractController
{
    #[Route('/info', name: 'info')]
    public function index(UserInterface $user): Response
    {
        $firstname = $user->getFirstname();
        $nbBalls = $user->getNbBalls();
        return $this->render('info/index.html.twig', [
            'firstName' => $firstname,
            'nbBalls' => $nbBalls
        ]);
    }
}
