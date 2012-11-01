<?php
namespace CajaBanco\BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ConceptoCajaType extends AbstractType
{
    
    //Falta hacer bien la consulta de cuenta 11% incorrecto, debe ser caja
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder->add('descripcion')
                ->add('tipoMovimiento')
                ->add('cuenta','entity',array(
                    'class'=>'CajaBanco\\BackendBundle\\Entity\\Cuenta',
                    'query_builder' => function(EntityRepository $er){
                        return $er->createQueryBuilder('c')
                            ->where("c.nCuenta like '11%'");
                    }
                        ))
                ->add('contracuenta','entity',array(
                    'class'=>'CajaBanco\\BackendBundle\\Entity\\Cuenta',
                    'query_builder' => function(EntityRepository $er){
                        return $er->createQueryBuilder('c')
                            ->where("c.asentable like 'S'");
                    }
                        ));
    }    
    public function getName()
    {
        return 'conceptoCaja_form';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CajaBanco\BackendBundle\Entity\ConceptoCaja',
        ));
    }
}