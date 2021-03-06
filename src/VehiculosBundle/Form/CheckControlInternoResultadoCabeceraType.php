<?php

namespace VehiculosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckControlInternoResultadoCabeceraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('observacion')
            ->add('vehiculo')
            ->add('checkControlInternoPregunta')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VehiculosBundle\Entity\CheckControlInternoResultadoCabecera'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vehiculosbundle_checkcontrolinternoresultadocabecera';
    }
}
