<?php

namespace App\Controller;

use App\Entity\Abonnements;
use App\Form\AbonnementType;
use App\Repository\AbonnementsRepository;
use App\Repository\AboutRepository;
use App\Repository\FavorisRepository;
use App\Repository\PostsRepository;
use App\Repository\UserRepository;
use App\Repository\PublicationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/users', name: 'users_')]
class UsersController extends AbstractController
{
    #[Route('/profile/{id}', name: 'profile')]
    public function index($id, UserRepository $usersRepo, AbonnementsRepository $aboRepo, PublicationsRepository $publiRepo, FavorisRepository $favorisRepo, PostsRepository $postRepo, AboutRepository $aboutRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $publi = count($publiRepo->findBy(['user' => $id]));
        $nbFollow = count($aboRepo->findBy(['recipient' => $id]));

        $posts = $postRepo->findBy(['user' => $id], ['id' => 'DESC'], 20);
        if(count($posts) >= 1){
            $posts = $posts;
        }else{
            $posts = 'Cette utilisateur n\'a pas creér de Posts';
        }
        return $this->render('users/profile.html.twig', [
            'users' => $usersRepo->findBy(['id' => $id]),
            'publications' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 5),
            'publigallery' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 20),
            'posts' => $posts,
            'publiNb' => $publi,
            'abotrue' => $aboRepo->findOneById($id, $this->getUser()),
            'abonnementuser' => $aboRepo->findBy(['sender' => $id]),
            'nbFollow' => $nbFollow,
            'abo' => $aboRepo->findAll(),
            'abosend' => $aboRepo->findBy(['sender' => $id]),
            'test' => $aboRepo->findByIdUser($id, $this->getUser()),

            // About section
            // 'About' => $aboutRepo->findBy(['user' => $id]),

            // Page Trois Favorites
            'favorite' => $favorisRepo->findBy(['user' => $id]),
            'favoritecount' => count($favorisRepo->findBy(['user' => $id])),
            'finduser' => $favorisRepo->findByIdUser()
        ]);
    }

    #[Route('abonnement/{id}', name: 'abonnement')]
    public function abo($id, AbonnementsRepository $aboRepo, UserRepository $usersRepo, PublicationsRepository $publiRepo): Response
    {
        $abonnement = new Abonnements();
        $abonnement->setSender($this->getUser());
        $abonnement->setRecipient($usersRepo->findOneById($id));

        $aboRepo->save($abonnement, true);

        return $this->redirectToRoute('users_profile', ['id' => $id]);
    }

    #[Route('desabonnement/{id}', name: 'desabonnement')]
    public function desabo($id, AbonnementsRepository $aboRepo, UserRepository $usersRepo, PublicationsRepository $publiRepo): Response
    {
        $aboDelete = $aboRepo->findOneById($id, $this->getUser());
        $aboRepo->remove($aboDelete, true);

        return $this->redirectToRoute('users_profile', ['id' => $id]);
    }
}
