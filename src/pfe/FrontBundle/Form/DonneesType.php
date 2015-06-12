<?php

namespace pfe\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DonneesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('date', 'date', array(
                          'widget' => 'single_text',
                          'input' => 'datetime',
                          'format' => 'yyyy-MM-dd',
                          'attr' => array('class' => 'date-picker'),
                      )
                  )
            ->add('heure','text',array(
                'required'    => false,
            ))
            ->add('nbrOp')
            ->add('mudas_logistique')
            ->add('mudas_maintenance')
            ->add('mudas_qualite')
            ->add('mudas_changement_Ref')
            ->add('mudas_divers')
            ->add('ligne')
            ->add('save', 'submit', array(
                'attr' => array(
                    'class' => 'btn blue'
                ),
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pfe\FrontBundle\Entity\Donnees',
     
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_frontbundle_donnees';
    }
}
