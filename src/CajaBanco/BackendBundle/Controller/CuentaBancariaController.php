<?php

namespace CajaBanco\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CajaBanco\BackendBundle\Form\CuentaBancariaType;
use CajaBanco\BackendBundle\Entity\CuentaBancaria;

class CuentaBancariaController extends Controller
{        
    public function insertarAction()
    {            
        $cuentaBancaria = new CuentaBancaria();       
        $form = $this->createForm(new CuentaBancariaType(), $cuentaBancaria);
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
                $em->persist($cuentaBancaria);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.               
                return $this->redirect($this->generateURL('ctabancaria_insertar'));
            }
        }
        return $this->render('CajaBancoBackendBundle:CuentaBancaria:insertar.html.twig', 
                array('form' => $form->createView(),
        ));    
    }
    public function editarAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $cuentaBancaria=$em->getRepository('CajaBancoBackendBundle:CuentaBancaria')->find($id);        
        $edit_form = $this->createForm(new CuentaBancariaType(), $cuentaBancaria);
        
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
                $em->persist($cuentaBancaria);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.
                return $this->redirect($this->generateURL('ctabancaria_insertar'));
            }
        }
        return $this->render('CajaBancoBackendBundle:CuentaBancaria:editar.html.twig', 
                array('cuentaBancaria'  => $cuentaBancaria,'edit_form' => $edit_form->createView(),
        ));    
    }
    public function listarAction()
    {       
        $em = $this->getDoctrine()->getEntityManager();
        $cuentasBancarias=$em->getRepository('CajaBancoBackendBundle:CuentaBancaria')->findAll();
        return $this->render('CajaBancoBackendBundle:CuentaBancaria:listar.html.twig', array('cuentasBancarias' => $cuentasBancarias));
    }
    public function verTodosAction()
    {
       $em = $this->getDoctrine()->getEntityManager();
        $cuentasBancarias=$em->getRepository('CajaBancoBackendBundle:CuentaBancaria')->findAll();
        return $this->render('CajaBancoBackendBundle:CuentaBancaria:verTodos.html.twig', array('cuentasBancarias' => $cuentasBancarias));
    } 
    public function borrarAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();
        $cuentaBancaria=$em->getRepository('CajaBancoBackendBundle:CuentaBancaria')->find($id);
        $em->remove($cuentaBancaria);
        $em->flush();
        return $this->redirect($this->generateUrl('ctabancaria_insertar'));
    }
}
