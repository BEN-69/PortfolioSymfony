<?php

namespace Ben\PortfolioBundle\Controller;

use Ben\PortfolioBundle\Entity\Contact;
use Ben\PortfolioBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="Home")
     */
    public function homeAction()
    {
        return $this->render('pages/home.html.twig');
    }

    /**
     * @Route("/about", name="About")
     */
    public function aboutAction()
    {
        $titre ="A propos ";
        $page="A propos ";

        return $this->render('pages/about.html.twig',array('titre'=> $titre,'page'=>$page));
    }

    /**
     * @Route("/portfolio", name="Portfolio")
     */
    public function portfolioAction()
    {
        $titre ="Formations";
        $page="Formations ";
        return $this->render('pages/portfolio.html.twig',array('titre'=> $titre,'page'=>$page));
    }


    /**
     * @Route("/contact", name="Contact")
     */
    public function contactAction(Request $request)
    {
        // return new Response("Bonjour tout le monde");
        $contact = new Contact();
        $session= new Session();

        // On récupere le formulaire
        $form = $this->createForm(ContactType::class,$contact);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();


            $session->getFlashBag()->add('success', " Votre message a été bien envoyé ");

            return $this->redirectToRoute('Contact');

        }

        $formView=$form->createView();
        return $this->render('pages/contact.html.twig',array('form'=>$formView));
    }



    /**
     * @Route("/competences", name="Competences")
     *
     */
    public function competencesAction()
    {
        $titre ="MES COMPÉTENCES TECHNIQUES";
        $page="Compétences ";
        return $this->render('pages/competences.html.twig',array('titre'=> $titre,'page'=>$page));
    }

    /**
     * @Route("/site", name="Site")
     */
    public function siteAction()
    {
        $titre ="Mes sites web ";
        $page="Site web ";
        return $this->render('pages/site-web.html.twig',array('titre'=> $titre,'page'=>$page));
    }
    /**
     * @Route("/applications", name="Applications")
     */
    public function applicationsAction()
    {
        $titre ="Mes applications ";
        $page="Application";
        return $this->render('pages/applications.html.twig',array('titre'=> $titre,'page'=>$page));
    }
    /**
     * @Route("/stage", name="Stage")
     */
    public function stageAction()
    {
        $titre ="Mes stages ";
        $page="Stage ";
        return $this->render('pages/stage.html.twig',array('titre'=> $titre,'page'=>$page));
    }

    /**
     * @Route("/conception", name="Conception")
     */
    public function conceptionAction()
    {
        $titre ="Conception ";
        $page="Conception ";
        return $this->render('pages/conception.html.twig',array('titre'=> $titre,'page'=>$page));
    }

    /**
     * @Route("/exercices", name="Exercices")
     */
    public function exercicesAction()
    {
        $titre ="Exercices ";
        $page="Exercices ";
        return $this->render('pages/exercices.html.twig',array('titre'=> $titre,'page'=>$page));
    }


    /**
     * @Route("/exercicesApp", name="Exercices_applications")
     */
    public function exercicesAppAction()
    {
        $titre ="Exercices d'applications ";
        $page="Exercices ";
        return $this->render('pages/exercices-app.html.twig',array('titre'=> $titre,'page'=>$page));
    }


}
