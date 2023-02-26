<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Favoris;
use App\Repository\FavorisRepository;
use App\Repository\PublicationsRepository;

class FavorisController extends AbstractController
{
    #[Route('/favoris', name: 'app_favoris')]
    public function index(): Response
    {
        return $this->render('favoris/index.html.twig', [
            'controller_name' => 'FavorisController',
        ]);
    }

    #[Route('/favoris/{id}', name: 'favorisclick')]
    public function Favoris($id, FavorisRepository $favorisRepo, PublicationsRepository $publiRepo): Response
    {
        $publi = $publiRepo->findOneBy(['id' => $id]);
        $user = $publi->getUser();
        $userId = $user->getId();

        $favoris = new Favoris();
        $favoris->setUser($this->getUser());
        $favoris->setPublication($publi);

        $favorisRepo->save($favoris, true);
        return $this->redirectToRoute('users_profile', ['id' => $userId]);
    }
}
