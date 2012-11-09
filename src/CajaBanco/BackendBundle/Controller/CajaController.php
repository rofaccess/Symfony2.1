<?php

namespace CajaBanco\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CajaBanco\BackendBundle\Form\CajaSimpleType;
use CajaBanco\BackendBundle\Form\CajaCompletType;
use CajaBanco\BackendBundle\Entity\Caja;

class CajaController extends Controller
{        
    public function insertarAction()
    {               
        $caja = new Caja();  
        date_default_timezone_set('America/Asuncion');
        $datetime=new \DateTime("now");        
        $caja->setFCreacion($datetime);
        $form = $this->createForm(new CajaSimpleType(), $caja);
        
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
                $em->persist($caja);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.               
                return $this->redirect($this->generateURL('caja_main'));
            }
        }
        return $this->render('CajaBancoBackendBundle:Caja:insertar.html.twig', 
                array('form' => $form->createView(),
        ));    
    }    
    public function editarAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $caja=$em->getRepository('CajaBancoBackendBundle:Caja')->find($id);        
        $edit_form = $this->createForm(new CajaCompletType(), $caja);
        
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
                $em->persist($caja);
                $em->flush();

                //-- Finalmente, al finalizar el procesamiento, siempre es
                //   importante realizar una redirección para no tener el
                //   problema de que al intentar actualizar el navegador
                //   nos dice que lo datos se deben volver a reenviar.
                return $this->redirect($this->generateURL('caja_main'));
            }
        }
        return $this->render('CajaBancoBackendBundle:Caja:editar.html.twig', 
                array('caja'  => $caja,'edit_form' => $edit_form->createView(),
        ));    
    }    
    public function listarAction()
    {       
        $em = $this->getDoctrine()->getEntityManager();
        $cajas	=$em->getRepository('CajaBancoBackendBundle:Caja')->findAll();
        return $this->render('CajaBancoBackendBundle:Caja:listar.html.twig', array('cajas' => $cajas));
    }    
    public function verTodosAction()
    {
       $em = $this->getDoctrine()->getEntityManager();
        $cajas	=$em->getRepository('CajaBancoBackendBundle:Caja')->findAll();
        return $this->render('CajaBancoBackendBundle:Caja:verTodos.html.twig', array('cajas' => $cajas));
    } 
    public function borrarAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();
        $caja=$em->getRepository('CajaBancoBackendBundle:Caja')->find($id);
        $em->remove($caja);
        $em->flush();
        return $this->redirect($this->generateUrl('caja_main'));
    }
    public function mainAction()
    {             
        return $this->render('CajaBancoBackendBundle:Caja:main.html.twig');
    }
}
