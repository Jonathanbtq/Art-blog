<?php

namespace App\Controller;

use App\Repository\PublicationsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users', name: 'users_')]
class UsersController extends AbstractController
{
    #[Route('/profile/{id}', name: 'profile')]
    public function index($id, UserRepository $usersRepo, PublicationsRepository $publiRepo): Response
    {
        $publi = count($publiRepo->findBy(['user' => $id]));
        return $this->render('users/profile.html.twig', [
            'users' => $usersRepo->findBy(['id' =>$id]),
            'publications' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 5),
            'publigallery' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 20),
            'publiNb' => $publi
        ]);
    }
}
