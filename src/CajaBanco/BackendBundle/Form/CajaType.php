<?php
namespace CajaBanco\BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder->add('nCaja', 'text', array('required'=> false))
                ->add('denominacion', 'text', array('required' => false))
                ->add('fCreacion', 'datetime', array(
                    'widget' => 'single_text',
                    
                    ))
        ;
    }    
    public function getName()
    {
        return 'caja_form';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CajaBanco\BackendBundle\Entity\Caja',
        ));
    }
    
}