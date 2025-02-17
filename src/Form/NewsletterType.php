<?php

namespace App\Form;

use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, [
                'label'=>false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control mb-sm-0',
                    'id' => 'inlineFormInputName3',
                    'placeholder' => 'Email',
                ],
                
            ])
            ->add('legal', CheckboxType::class, [
                'required' => true,
            ])
            ->add('consentimiento', CheckboxType::class, array(
                'required'=>false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
