<?php

namespace pfe\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLigne')
            ->add('zone')
            ->add('poste')
            ->add('superviseur')
            ->add('teamleader')
            ->add('objectifligne')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pfe\FrontBundle\Entity\Ligne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_frontbundle_ligne';
    }
}
