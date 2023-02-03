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
        $publi = count($publiRepo->findAll($id));
        return $this->render('users/profile.html.twig', [
            'users' => $usersRepo->findAll($id),
            'publications' => $publiRepo->findBy(['user' => $this->getUser()], ['id' => 'ASC'], 5),
            'publiNb' => $publi
        ]);
    }
}
