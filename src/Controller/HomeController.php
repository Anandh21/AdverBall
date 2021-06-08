<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends  AbstractController
{
    #[Route('/', name:'home')]
    public function index(): Response
    {
        return  $this->render('pages/home.html.twig');
    }
    #[Route('/game')]
    public function game()
    {
        return $this->render('pages/game.html.twig');
    }

}