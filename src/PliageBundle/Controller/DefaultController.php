<?php

namespace PliageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PliageBundle:Default:index.html.twig');
    }
    
    public function accueilAction()
    {
        return $this->render('PliageBundle:Default:accueil.html.twig');
    }
    
    public function contactAction()
    {
        
        
        $nom='Athos';
        
        return $this->render('PliageBundle:Default:contact.html.twig',array(
            'chat' => $nom
        ));
    }
    
    public function creationcontactAction()
    {
        return $this->render('PliageBundle:Default:creationcontact.html.twig');
    }    
    
    public function debitpliageAction()
    {
        //Récupération de la base de données
        $em = $this->getDoctrine()->getManager();
        $pliageRepository = $em->getRepository('PliageBundle:Pliage');
        
        $pliages = $pliageRepository->findBy(array(
            'actif' => true,
        ),array(
            'categorie' => 'ASC',
        ));
        
        $tab = array();
        $idCategorie = null;
        foreach($pliages as $pliage){
            if($idCategorie == null || $idCategorie != $pliage->getCategorie()->getId() ){
                $idCategorie = $pliage->getCategorie()->getId();
            }
            $tab[$idCategorie][] = $pliage;
        }
        
        return $this->render('PliageBundle:Default:debitpliage.html.twig',array(
            'pliages' => $tab,
        ));
    }
    
    public function debitmateriauxAction()
    {
        return $this->render('PliageBundle:Default:debitmateriaux.html.twig');
    }
    
    public function debittoleAction()
    {
        return $this->render('PliageBundle:Default:debittole.html.twig');
    }
}
