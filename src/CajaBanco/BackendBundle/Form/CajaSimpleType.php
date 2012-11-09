<?php
namespace CajaBanco\BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaSimpleType extends AbstractType
{       
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder->add('nCaja')
                ->add('denominacion')
                ->add('fCreacion','datetime', array('widget' => 'single_text',
                                                    'format'=>'y/M/d H:m',    ))                
        ;
    }    
    public function getName()
    {
        return 'caja_form_simple';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CajaBanco\BackendBundle\Entity\Caja',
        ));
    }
    
}