<?php

namespace CajaBanco\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class pageController extends Controller
{
    public function indexAction()
    {
        return $this->render('CajaBancoBackendBundle::index.html.twig');
    }   
    
}
