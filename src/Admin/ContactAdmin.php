<?php

namespace App\Admin;

use App\Entity\Contact;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactAdmin extends AbstractAdmin
{
    protected $classnameLabel = 'Contact';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Contenido', ['class' => 'col-md-12'])
                ->add('name', TextType::class, [
                    'label'=> 'Nombre',
                    'required' => true,
                    "attr" =>array(
                        "autocomplete" => "off"
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'No puede quedar vacío')),
                        new Length(array('min' => 4, 'max' => 50)
                    ))
                ])
                ->add('telephone', TelType::class, [
                    'label'=> 'Teléfono',
                    "attr" =>array(
                        "autocomplete" => "off"
                    ),
                ])
                ->add('email', EmailType::class, [
                    'label'=> 'Email',
                    'required' => true,
                    "attr" =>array(
                        "autocomplete" => "off"
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'No puede quedar vacío')),
                        new Length(array('min' => 5, 'max' => 50)
                    ))
                ])
                ->add('subject', TextType::class, [
                    'label'=> 'Subject',
                    'required' => true,
                    "attr" =>array(
                        "autocomplete" => "off"
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'No puede quedar vacío')),
                        new Length(array('min' => 2, 'max' => 50)
                    ))
                ])
                ->add('content', TextareaType::class, [
                    'label'=> 'Mensaje',
                    'required' => true,
                    "attr" =>array(
                        "autocomplete" => "off"
                    ),
                    'constraints' => array(
                        new NotBlank(array('message' => 'No puede quedar vacío')),
                    )
                ])
            ->add('consentimiento')
            ->add('legal')
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('subject', null, ['label'=> 'Apellido'])
            ->add('name', null, ['label'=> 'Nombre'])
            ->add('telephone', null, ['label'=> 'Teléfono'])
            ->add('email', null, ['label'=> 'Email'])
            ->add('content', null, ['label'=> 'Mensaje'])
            ->add('consentimiento', null, ['label'=> 'Consentimimento'])
            ->add('legal',  null, ['label'=> 'Aviso legal'])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('subject', null, ['label'=> 'Apellido'])
            ->add('name', null, ['label'=> 'Nombre'])
            ->add('email', null, ['label'=> 'Email'])
        ;
    }

    public function toString($object)
    {
        return $object instanceof Contact
            ? $object->getName()
            : 'Contact'; // shown in the breadcrumb on the create view
    }

    public function getExportFields()
    {
        return ['name', 'subject', 'telephone', 'email', 'content', 'createdAt'];
    }

    public function getExportFormats()
    {
        return ['csv', 'xls'];
    }

    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );
}
?>