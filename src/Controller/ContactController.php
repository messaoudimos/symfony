<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts", methods = {"GET"})
     */
    // public function index(): Response
    public function listContacts(ContactRepository $repo): Response
    {
        // $manager = $this ->getDoctrine()->getManager();
        // $repo = $manager ->getRepository(Contact::class);
        $contacts = $repo -> findAll();
        // dump($contacts);
        return $this->render('contact/listeContacts.html.twig', [
            'controller_name' => 'ContactController',
            'lescontacts'=>$contacts
        ]);
    }
     /**
     * @Route("/contact/{id}", name="ficheContact", methods = {"GET"})
     */
    // public function index(): Response
    public function ficheContact($id,ContactRepository $repo): Response
    {
        // $manager = $this ->getDoctrine()->getManager();
        // $repo = $manager ->getRepository(Contact::class);
        $contact = $repo -> find($id);
        return $this->render('contact/ficheContact.html.twig', [
            'controller_name' => 'ContactController',
            'lecontact'=>$contact
        ]);
    }
    /**
     * @Route("/contact/sexe/{sexe}", name="listeContactsSexe", methods = {"GET"})
     */
    public function listeContactsSexe($sexe,ContactRepository $repo): Response
    {
        // $manager = $this ->getDoctrine()->getManager();
        // $repo = $manager ->getRepository(Contact::class);
        $contacts = $repo -> findBy(
            ['sex'=>$sexe],
            ['nom'=>'ASC'],
        );
        return $this->render('contact/listeContacts.html.twig', [
            'controller_name' => 'ContactController',
            'lescontacts'=>$contacts
        ]);
    }


}
 
