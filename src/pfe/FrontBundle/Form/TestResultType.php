<?php

namespace pfe\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestResultType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateHeure')
            ->add('codeProduct')
            ->add('serialNumber')
            ->add('movement')
            ->add('status')
            ->add('default')
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pfe\FrontBundle\Entity\TestResult'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_frontbundle_testresult';
    }
}
