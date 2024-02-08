<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="app_accueil", methods={"GET"})
     */
    public function index(): Response
    {
        $nomsStudents=['jeremie', 'ousmane',"alexia", "julien"];
        $age=17;
        return $this->render('accueil/index.html.twig',[
            /** 'controller_name' => 'AccueilController', */
            "lesNoms"=>$nomsStudents,
            "Age"=>$age
        ]);
    }
}
