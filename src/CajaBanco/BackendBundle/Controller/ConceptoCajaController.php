<?php

namespace CajaBanco\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CajaBanco\BackendBundle\Form\ConceptoCajaType;
use CajaBanco\BackendBundle\Entity\ConceptoCaja;

class ConceptoCajaController extends Controller
{        
    public function insertarAction()
    {       
        
        $conceptoCaja = new ConceptoCaja();       
        
        $form = $this->createForm(new ConceptoCajaType(), $conceptoCaja);
        
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
                $em->persist($conceptoCaja);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.               
                return $this->redirect($this->generateURL('conceptoCaja_insertar'));
            }
        }
        return $this->render('CajaBancoBackendBundle:ConceptoCaja:insertar.html.twig', 
                array('form' => $form->createView(),
        ));    
    }
    public function editarAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $conceptoCaja=$em->getRepository('CajaBancoBackendBundle:ConceptoCaja')->find($id);        
        $edit_form = $this->createForm(new ConceptoCajaType(), $conceptoCaja);
        
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
                $em->persist($conceptoCaja);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.
                return $this->redirect($this->generateURL('conceptoCaja_insertar'));
            }
        }
        return $this->render('CajaBancoBackendBundle:ConceptoCaja:editar.html.twig', 
                array('conceptoCaja'  => $conceptoCaja,'edit_form' => $edit_form->createView(),
        ));    
    }
    public function listarAction()
    {       
        $em = $this->getDoctrine()->getEntityManager();
        $conceptosCaja	=$em->getRepository('CajaBancoBackendBundle:ConceptoCaja')->findAll();
        return $this->render('CajaBancoBackendBundle:ConceptoCaja:listar.html.twig', array('conceptosCaja' => $conceptosCaja));
    }
    public function verTodosAction()
    {
       $em = $this->getDoctrine()->getEntityManager();
        $conceptosCaja	=$em->getRepository('CajaBancoBackendBundle:ConceptoCaja')->findAll();
        return $this->render('CajaBancoBackendBundle:ConceptoCaja:verTodos.html.twig', array('conceptosCaja' => $conceptosCaja));
    } 
    public function borrarAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();
        $conceptoCaja=$em->getRepository('CajaBancoBackendBundle:ConceptoCaja')->find($id);
        $em->remove($conceptoCaja);
        $em->flush();
        return $this->redirect($this->generateUrl('conceptoCaja_insertar'));
    }
}
