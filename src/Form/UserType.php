<?php

namespace App\Form;

use App\Entity\Avatar;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class,  [
                "choices" => [
                    "ADMIN" => "ROLE_ADMIN",
                    "MANAGER" => "ROLE_MANAGER", 
                    "USER" => "ROLE_USER"
                ], 
                'multiple' => true,
                'expanded' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir un rôle'
                    ])
                ]
            ])
            // before datas of the form been defined
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){

                // the form under construction
                $formulaire = $event->getForm();
                // datas of the form
                $data = $event->getData();

                // for the modification
                if ($data->getId() !== null)
                {
                    $formulaire->add('password', PasswordType::class, [
                        "attr" => [
                            "placeholder" => "laisse vide si inchangé"
                        ],
                        // this password value will not automatically be associated with the user (we can hash it first)
                        "mapped" => false
                    ]);
                    
                // for the creation of an user
                } else {
                    $formulaire->add('password', PasswordType::class, [
                        "attr" => [
                            "placeholder" => "votre mot de passe"
                        ],
                        "mapped" => false, 
                    ])
                    ->add('password_confirmed', PasswordType::class, [
                        "attr" => [
                            "placeholder" => "veuillez confirmer le mot de passe"
                        ],
                        "mapped" => false,
                        ]);  
                }
            })
            
            ->add('avatar', EntityType::class, [
                'class' => Avatar::class,
                'choice_label' => 'name',
                'label' => 'Choix de l\'avatar',
                'expanded' => true,
            ]);
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
