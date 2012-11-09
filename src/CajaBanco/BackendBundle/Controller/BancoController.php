<?php

namespace CajaBanco\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CajaBanco\BackendBundle\Form\BancoType;
use CajaBanco\BackendBundle\Entity\Banco;

class BancoController extends Controller
{        
    public function insertarAction()
    {            
        $banco = new Banco();       
        $form = $this->createForm(new BancoType(), $banco);
        //-- Obtenemos el request que contendrá los datos
        $request = $this->getRequest();
        if($request->getMethod() == 'POST')
        {
            //-- Carga en dentro de $form los datos del formulario cuando se clickea insertar
            $form->bind($request);
            
            //-- Verifica la validez de los datos
            if($form->isValid())
            {
                //-- Procesamos los datos que ya están automáticamente
                //   cargados dentro de nuestra variable $conceptoCaja
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($banco);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.               
                return $this->redirect($this->generateURL('banco_main'));
            }
        }
        return $this->render('CajaBancoBackendBundle:Banco:insertar.html.twig', 
                array('form' => $form->createView(),
        ));    
    }
    public function editarAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $banco=$em->getRepository('CajaBancoBackendBundle:Banco')->find($id);        
        $edit_form = $this->createForm(new BancoType(), $banco);
        
        //-- Obtenemos el request que contendrá los datos
        $request = $this->getRequest();
        if($request->getMethod() == 'POST')
        {
            //-- Pasamos el request al método bind() del objeto 
            //   formulario el cual obtiene los datos del formulario
            //   y los carga dentro del objeto ConceptoCaja que está contenido
            //   también dentro del objeto Type
            $edit_form->bind($request);

            //-- Verifica la validez de los datos
            if($edit_form->isValid())
            {
                //-- Procesamos los datos que ya están automáticamente
                //   cargados dentro de nuestra variable $conceptoCaja
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($banco);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.
                return $this->redirect($this->generateURL('banco_main'));
            }
        }
        return $this->render('CajaBancoBackendBundle:Banco:editar.html.twig', 
                array('banco'  => $banco,'edit_form' => $edit_form->createView(),
        ));    
    }
    public function listarAction()
    {       
        $em = $this->getDoctrine()->getEntityManager();
        $bancos	=$em->getRepository('CajaBancoBackendBundle:Banco')->findAll();
        return $this->render('CajaBancoBackendBundle:Banco:listar.html.twig', array('bancos' => $bancos));
    }
    public function verTodosAction()
    {
       $em = $this->getDoctrine()->getEntityManager();
        $bancos	=$em->getRepository('CajaBancoBackendBundle:Banco')->findAll();
        return $this->render('CajaBancoBackendBundle:Banco:verTodos.html.twig', array('bancos' => $bancos));
    } 
    public function borrarAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();
        $banco=$em->getRepository('CajaBancoBackendBundle:Banco')->find($id);
        $em->remove($banco);
        $em->flush();
        return $this->redirect($this->generateUrl('banco_main'));
    }
    public function mainAction()
    {             
        return $this->render('CajaBancoBackendBundle:Banco:main.html.twig');
    }
}
