<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['autofocus' => true, 'class'=> 'form-control'],
                'required' => true
            ])
            ->add('firstname', TextType::class, [
                'attr' => ['class'=> 'form-control'],
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class'=> 'form-control'],
                'required' => true
            ])
            ->add('postal_address', TextType::class, [
                'attr' => ['class'=> 'form-control'],
            ])
            ->add('gender', EntityType::class, array(
                'class' => 'App\Entity\GenderType',
                'choice_label' => 'title_gender',
                'multiple'     => false,
                'attr' => ['class' => 'form-control']
            ))
            ->add('password', PasswordType::class, [
                'attr' => ['class'=> 'form-control'],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}
