<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => 'Nombre*',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                )
            ))

            ->add('subject',TextType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => 'Asunto*',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                )
            ))

            ->add('telephone',TextType::class, array(
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => 'Teléfono',
                    "autocomplete" => "off"
                ),
            ))

            ->add('email', TextType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => 'Email*',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                    )
            ))

            ->add('content', TextareaType::class, array(
                    "required"=>"required",
                    "attr" =>array(
                        "class" => "form-control",
                        "placeholder" => 'Mensaje*',
                        "autocomplete" => "off",
                        'rows' => '3'
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'It can not be empty')),
                    ))
            );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}