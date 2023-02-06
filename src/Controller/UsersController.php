<?php

namespace App\Controller;

use App\Entity\Abonnements;
use App\Form\AbonnementType;
use App\Repository\AbonnementsRepository;
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
    public function index($id, UserRepository $usersRepo, AbonnementsRepository $aboRepo, PublicationsRepository $publiRepo): Response
    {
        $publi = count($publiRepo->findBy(['user' => $id]));
        $nbFollow = count($aboRepo->findBy(['recipient' => $id]));
        return $this->render('users/profile.html.twig', [
            'users' => $usersRepo->findBy(['id' => $id]),
            'publications' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 5),
            'publigallery' => $publiRepo->findBy(['user' => $id], ['id' => 'DESC'], 20),
            'publiNb' => $publi,
            'abotrue' => $aboRepo->findOneById($id, $this->getUser()),
            'abonnementuser' => $aboRepo->findBy(['sender' => $id]),
            'nbFollow' => $nbFollow,
            'abo' => $aboRepo->findAll(),
            'abosend' => $aboRepo->findBy(['sender' => $id]),
            'test' => $aboRepo->findByIdUser($id, $this->getUser()),
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
