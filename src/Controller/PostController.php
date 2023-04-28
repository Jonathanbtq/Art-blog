<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\PostFormType;
use App\Repository\PostsRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'profile_post_create')]
    public function index(PostsRepository $postRepo, Request $request): Response
    {
        $post = new Posts;
        $formPost = $this->createForm(PostFormType::class, $post);
        $formPost->handleRequest($request);
        
        if ($formPost->isSubmitted() && $formPost->isValid()) { 
            $post->setUser($this->getUser());
            $post->setDateUpload(new DateTimeImmutable());

            $postRepo->save($post, true);
            return $this->redirectToRoute('main');
        }
        return $this->render('post/createPost.html.twig', [
            'controller_name' => 'PostController',
            'formPost' => $formPost->createView()
        ]);
    }
}
