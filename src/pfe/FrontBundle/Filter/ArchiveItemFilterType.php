<?php
/**
 * Created by PhpStorm.
 * User: Nizar
 * Date: 09/06/2015
 * Time: 18:45
 */

namespace pfe\FrontBundle\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ArchiveItemFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateHeure', 'filter_datetime_range', array(
            'left_datetime_options' => array(
                'attr' => array('class' => 'datepicker'),
                'widget'    => 'single_text',
            ),
            'right_datetime_options' => array(
                'attr' => array('class' => 'datepicker'),
                'widget'    => 'single_text',
            ),
            'label' => 'Collect Period',
        ));
        $builder->add('codeProduct', 'filter_text');

        $builder->add('serialNumber', 'filter_text');
        $builder->add('movement', 'filter_choice',array(
            'choices' => array(
                'ASSEMBLY'=>'ASSEMBLY',
                'TF'=>'TF'
            )
        ));
        $builder->add('status', 'filter_choice',array(
            'choices' => array(
                'PASS'=>'PASS',
                'FAIL'=>'FAIL'
            )
        ));
        $builder->add('default', 'filter_text');
    }

    public function getName()
    {
        return 'item_filter';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}