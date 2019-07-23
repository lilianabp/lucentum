<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Contact;
use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class ContactType extends AbstractType
{
    private $em;

    /**
     * The Type requires the EntityManager as argument in the constructor. It is autowired
     * in Symfony 3.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => '*Nombre',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                    new Length(array('min' => 3, 'max' => 30)
                    ))
            ))

            ->add('surname',TextType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => '*Apellidos',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                    new Length(array('min' => 2, 'max' => 30)
                    ))
            ))

            ->add('telephone',TelType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => '*Teléfono',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                    new Length(array('min' => 5, 'max' => 30)
                    ))
            ))

            ->add('email', EmailType::class, array(
                "required"=>"required",
                "attr" =>array(
                    "class" => "form-control",
                    "placeholder" => '*Email',
                    "autocomplete" => "off"
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'It can not be empty')),
                    new Length(array('min' => 6, 'max' => 254)
                    ))
            ))

            ->add('content', TextareaType::class, array(
                    "required"=>"required",
                    "attr" =>array(
                        "class" => "form-control",
                        "placeholder" => 'Mensaje',
                        "autocomplete" => "off",
                        'rows' => '3'
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'It can not be empty')),
                    ))
            )

            ->add('conditions', CheckboxType::class, array(
                'attr' => array(
                    'class' => 'form-check'
                ),
                'label_attr' => array('class' => 'texto-condiciones'),
                'label' => "He leído y acepto la política de privacidad",
                'mapped' => false,
                'constraints' => new IsTrue(
                    array(
                        "message" => "Debes aceptar para continuar")
                )
            ));

//            ->add('submit', SubmitType::class, array(
//                "label" => 'ENVIAR',
//                "attr" =>array(
//                    "class" => "boton btn-contact col",
//            )));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}