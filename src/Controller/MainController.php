<?php

namespace App\Controller;

use App\Repository\PublicationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(PublicationsRepository $publiRepo): Response
    {
        return $this->render('main/index.html.twig', [
            'publications' => $publiRepo->findAll()
        ]);
    }
}
