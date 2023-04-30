<?php

namespace App\Controller;

use App\Entity\About;
use App\Form\AboutFormType;
use App\Repository\AboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about/form/type', name: 'app_about_form_type')]
    public function index(Request $request, AboutRepository $aboutRepo): Response
    {
        $about = new About();
        $form = $this->createForm(AboutFormType::class, $about);
        $form->handleRequest($request);
        
        $user = $this->getUser();
        if($form->isSubmitted() && $form->isValid()){
            $about->setBirthdayDate($user['birthday_date']);
        }

        return $this->render('about_form/aboutform.html.twig', [
            'controller_name' => 'AboutController',
            'form_about' => $form->createView()
        ]);
    }
}
