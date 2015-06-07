<?php
/**
 * Created by PhpStorm.
 * User: Nizar
 * Date: 01/06/2015
 * Time: 23:56
 */
namespace pfe\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder->add('roles', 'collection', array(
                    'type' => 'choice',
                    'options' => array(
                        'label' => false, /* Ajoutez cette ligne */
                        'choices' => array(
                            '' => '',
                            'ROLE_ADMIN' => 'Administrateur',
                            'ROLE_DIRECTEUR' => 'Directeur',
                            'ROLE_RESPONSABLE' => 'Responsable',
                            'ROLE_SUPERVISEUR' => 'Superviseur',
                            'ROLE_TEAM_LEADER' => 'Team leader'
                        ),
                        'attr' => array('class'=>'form-control')
                    )
                )
            )
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'front_user_registration';
    }

}