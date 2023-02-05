<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Form\CategoryType;
use App\Repository\CategoriesRepository;
use App\Repository\PublicationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(Request $request, CategoriesRepository $categRepo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        $categ = new Categories();
        $form = $this->createForm(CategoryType::class, $categ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $categRepo->save($categ, true);
            return $this->redirectToRoute('category');
        }
        return $this->render('category/addcat.html.twig', [
            'formcat' => $form->createView(),
            'categorie' => $categRepo->findAll()
        ]);
    }

    #[Route('/category/{name}', name: 'categoryadd')]
    public function showCategory($name, CategoriesRepository $categRepo): Response
    {
        return $this->render('category/categoryshow.html.twig', [
            'category' => $categRepo->findBy(['name' => $name], ['name' => 'ASC']),
        ]);
    }
}
