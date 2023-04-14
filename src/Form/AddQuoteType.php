<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Quote;
use App\Entity\Episode;
use App\Entity\Personage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddQuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextType::class, [
                'label' => 'Texte de la citation',
            ]
            )
            // ->add('rating')
            // ->add('validated')
            ->add('episode', EntityType::class, [
                'class' => Episode::class,
                'choice_label' => 'title',
                'label' => 'Titre de l\'épisode',
                'expanded' => false,
                'required' => false
            ])
            ->add('personage', EntityType::class, [
                'class' => Personage::class,
                'choice_label' => 'name',
                'label' => 'Nom du personage',
                'expanded' => false,
                'required' => false
            ])
            // ->add('user', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'email',
            //     'label' => 'Utilisateur',
            //     'expanded' => false,
            //     'required' => false
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quote::class,
            'attr' =>[
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
