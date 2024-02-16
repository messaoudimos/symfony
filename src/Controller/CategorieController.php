<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categories", methods = {"GET"})
     */
    public function listCategorie(CategorieRepository $repo): Response
    {
        $categories = $repo -> findAll();

        return $this->render('categorie/listeCategorie.html.twig', [
            'lescategories'=>$categories

        ]);
    }

     /**
     * @Route("/categorie/{id}", name="fichecategorie", methods = {"GET"})
     */
    public function fichecategorie($id,CategorieRepository $repo): Response
    {
        // $manager = $this ->getDoctrine()->getManager();
        // $repo = $manager ->getRepository(Contact::class);
        $categorie = $repo -> find($id);
        return $this->render('categorie/fichecategorie.html.twig', [
            'lacategorie'=>$categorie,
        ]);
    }
}
