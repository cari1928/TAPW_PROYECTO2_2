<?php

namespace Proyecto2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class VueloType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('idvuelo')
            // ->add('monto', TextType::class)
            ->add('cupon', NumberType:: class)
            // ->add('total', NumberType::class)
            // ->add('iddisponibles', EntityType::class, array('class'=>'Proyecto2Bundle:Disponibles',
            //                                                     'choice_label'=>'iddisponibles'))
            ->add('idasiento', EntityType::class, array('class'=>'Proyecto2Bundle:Asiento',
                                                                'choice_label'=>'letra')))
            // ->add('idcliente', EntityType::class, array('class'=>'Proyecto2Bundle:Cliente',
            //                                     'choice_label'=>'nombres')) 
            ->add('Guardar', SubmitType::class)                                                                                                
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto2Bundle\Entity\Vuelo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proyecto2bundle_vuelo';
    }


}
