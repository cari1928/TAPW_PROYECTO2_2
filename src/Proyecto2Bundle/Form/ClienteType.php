<?php

namespace Proyecto2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('direccion', TextType::class)
            ->add('direccionFacturacion', TextType::class)
            ->add('modoPago', ChoiceType::class, array(
                                                        'choices'  => array(
                                                            'Efectivo' => 'Efectivo',
                                                            'Tarjeta' => 'Tarjeta',
                                                        ),
                                                    ))
            ->add('nacimiento', DateType::class) 
            ->add('Guardar', SubmitType::class)
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto2Bundle\Entity\Cliente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'proyecto2bundle_cliente';
    }


}
