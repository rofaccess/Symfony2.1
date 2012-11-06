<?php
namespace CajaBanco\BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CuentaBancariaType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder->add('nCuenta')
                ->add('banco')
                ->add('fApertura','datetime', array('widget' => 'single_text',))
                ->add('mActual')
                ->add('moneda')
                ->add('fCancelacion', 'datetime', array('widget' => 'single_text',))                
        ;
    }    
    public function getName()
    {
        return 'ctabancaria_form';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CajaBanco\BackendBundle\Entity\CuentaBancaria',
        ));
    }
    
}