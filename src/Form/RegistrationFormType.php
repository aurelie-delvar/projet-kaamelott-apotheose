<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Avatar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        // we take the user's data if there are, else we return null
        $user = $options['data'] ?? null;
        // as we want the email form to be disabled, we'll put this var in the corresponding field
        // it checks if user exists and has an Id, and returns true or false
        $hasEmail = $user && $user->getId();

        $builder
            ->add('email', TextType::class, [
                'label' => 'Votre adresse email',
                // here it will be true or false
                'disabled' => $hasEmail,
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation mot de passe'],
                'constraints' => [
                    new Regex("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-+\-]).{8,}$/",
                    'Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial'),
                    new NotBlank([
                        'message' => 'Veuillez renseigner un mot de passe.'
                    ])
                ]
            ])
            ->add('avatar', EntityType::class, [
                'class' => Avatar::class,
                'choice_label' => 'name',
                'label' => 'Choix de l\'avatar',
                'expanded' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' =>[
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
