<?php

namespace PliageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PliageController extends Controller
{

    public function debitAction()
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
        
        return $this->render('PliageBundle:Pliage:debit.html.twig',array(
            'pliages' => $tab,
        ));
    }
}
