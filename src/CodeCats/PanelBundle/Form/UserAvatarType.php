<?php

namespace CodeCats\PanelBundle\Form;

use CodeCats\PanelBundle\Entity\Avatar;
use CodeCats\PanelBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserAvatarType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password', 'repeated', array(
                'first_name'    => 'password',
                'second_name'   => 'confirm',
                'type'          => 'password'
            ))
            ->add('avatar', new AvatarType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CodeCats\PanelBundle\Entity\User',
            'cascade_validation' => true,
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
