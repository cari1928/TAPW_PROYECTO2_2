<?php

namespace Proyecto2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DisponiblesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('fechahora', DateTimeType::class, array('required'=>'required'))
            ->add('idorigen', EntityType::class, array('class'=>'Proyecto2Bundle:Aeropuerto',
                                                        'choice_label'=>'nombre'))
            ->add('iddestino', EntityType::class, array('class'=>'Proyecto2Bundle:Aeropuerto',
                                                        'choice_label'=>'nombre'))
            ->add('idtarifa', EntityType::class, array('class'=>'Proyecto2Bundle:Tarifa',
                                                        'choice_label'=>'clase'))
            ->add('idavion', EntityType::class, array('class'=>'Proyecto2Bundle:Avion',
                                                        'choice_label'=>'marca'))        
            ->add('Buscar', SubmitType::class)
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto2Bundle\Entity\Disponibles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proyecto2bundle_disponibles';
    }


}
