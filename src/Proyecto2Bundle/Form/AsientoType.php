<?php

namespace Proyecto2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AsientoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('letra', EntityType::class, array('class'=>'Proyecto2Bundle:Asiento',
                                                    'choice_label'=>'letra')))
        // ->add('fila', EntityType::class, array('class'=>'Proyecto2Bundle:Asiento',
        //                                             'choice_label'=>'fila')))        
        ->add('Guardar', SubmitType::class)                                                                                                
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto2Bundle\Entity\Asiento'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proyecto2bundle_asiento';
    }


}
