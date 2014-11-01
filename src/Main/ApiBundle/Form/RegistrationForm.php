<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 24.10.2014
 * Time: 15:46
 */

namespace Main\ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option){

        $builder->add('username', 'text')
                ->add('lastName', 'text')
                ->add('email', 'email')
                ->add('password', 'password')
                ->add('create', 'submit');
    }

    public function getName()
    {
        return 'registration_form';
    }
}