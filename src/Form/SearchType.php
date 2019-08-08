<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Entity\Marca;
use App\Entity\Cambio;
use App\Entity\Combustible;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marca', EntityType::class, [
                'class' => Marca::class,
                'choice_label' => 'nombre',
                'placeholder' => 'Marca',
                'required' => false,
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            ->add('modelo', TextType::class, ['required' => false])
            ->add('combustible', EntityType::class, [
                'class' => Combustible::class,
                'choice_label' => 'tipo',
                'placeholder' => 'Combustible',
                'required' => false,
                'attr' => [
                    'class'=>'form-control'
                ]
            ])
            ->add('anio', TextType::class, ['required' => false])
            ->add('oferta', CheckboxType::class, [
                'required' => false,
            ])
            ->add('precio', TextType::class, ['required' => false])
            ->add('cambio', EntityType::class, [
                'class' => Cambio::class,
                'choice_label' => 'tipo',
                'placeholder' => 'Cambio',
                'required' => false,
                'attr' => [
                    'class'=>'form-control'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => null,
        ]);
    }
}
