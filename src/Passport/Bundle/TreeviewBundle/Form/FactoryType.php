<?php

namespace Passport\Bundle\TreeviewBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FactoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('children', null, array('data'=>1))
            ->add('min', null, array('data'=>0))
            ->add('max', null, array('data'=>100))
            //->add('modified')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Passport\Bundle\TreeviewBundle\Entity\Factory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'passport_bundle_treeviewbundle_factory';
    }
}
