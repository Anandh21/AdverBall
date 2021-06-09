<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class FavoriteController extends  AbstractController
{
    #[Route('/favorite-brand', name:'favorite')]
    public function index(): Response
    {
        return  $this->render('pages/favorite.html.twig');
    }

}