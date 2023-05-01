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

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->getUser();
            
            $userbirth = $user->birthday_date;
            if($userbirth){
                $about->setBirthdayDate($userbirth);
            }
            $about->setBirthdayBlog($user->getFirstConnect());
            $aboutRepo->save($about, true);
            return $this->redirectToRoute('main');
        }

        return $this->render('about_form/aboutform.html.twig', [
            'controller_name' => 'AboutController',
            'form_about' => $form->createView(),
        ]);
    }
}
