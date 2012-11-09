<?php
namespace CajaBanco\BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaCompletType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder->add('nCaja')
                ->add('denominacion')
                ->add('fCreacion','datetime', array('widget' => 'single_text',
                                                    'format'=>'y/MM/dd HH:mm', ))                
                ->add('estado2','choice', array('choices' => array('Activo' => 'Activo','Inactivo' => 'Inactivo'),))
        ;
    }       
    public function getName()
    {
        return 'caja_form_complet';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CajaBanco\BackendBundle\Entity\Caja',
        ));
    }
    
}