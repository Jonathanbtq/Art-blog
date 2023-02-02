<?php

namespace App\Controller;

use App\Entity\Categories;
use DateTimeImmutable;
use App\Entity\Publications;
use App\Form\PublicationFormType;
use App\Repository\CategoriesRepository;
use App\Repository\PublicationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PublicationController extends AbstractController
{
    #[Route('/publication', name: 'app_publication')]
    public function index(): Response
    {
        return $this->render('publication/index.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }

    #[Route('/publication/{id}', name: 'viewpublication')]
    public function show($id, PublicationsRepository $publicRepo): Response
    {
        return $this->render('publication/show.html.twig', [
            'controller_name' => 'PublicationController',
            'publications' => $publicRepo->findAll($id)
        ]);
    }

    #[Route('/createpubli', name: 'createpubli')]
    public function create(PublicationsRepository $publicRepo, Request $request, #[Autowire('%photo_dir%')] string $photoDir, CategoriesRepository $catRepo): Response
    {
        $publication = new Publications();
        $form = $this->createForm(PublicationFormType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->get('category')->getData();
            $publication->addCategory($cat);
            $publication->setUser($this->getUser());
            $publication->setCreatedAt(new DateTimeImmutable());
            if ($photo = $form['img_couverture']->getData()) {
                $filename = bin2hex(random_bytes(6)) . '.' . $photo->guessExtension();
                try {
                    $photo->move($photoDir, $filename);
                } catch (FileException $e) {
                    // Unable to upload the photo, give up
                }
                $publication->setImgCouverture($filename);
            }

            $publicRepo->save($publication, true);
            return $this->redirectToRoute('main');
        }
        return $this->render('publication/create.html.twig', [
            'form_publi' => $form->createView()
        ]);
    }
}
