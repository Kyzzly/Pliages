<?php

namespace PliageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function indexAction()
    {
        $nom = 'Athos';
        
        return $this->render('PliageBundle:Contact:index.html.twig',array(
            'chat' => $nom
        ));
    }
    
    public function addAction()
    {
        return $this->render('PliageBundle:Contact:add.html.twig');
    }
}
