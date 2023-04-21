<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Quote;
use App\Entity\Episode;
use App\Entity\Personage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddQuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextareaType::class, [
                'label' => 'Texte de la citation',
            ]
            )
            ->add('episode', EntityType::class, [
                'class' => Episode::class,
                'choice_label' => 'title',
                'constraints' => [new NotBlank(['message' => 'Ce champ ne peut être vide'])],
                'label' => 'Titre de l\'épisode',
                'expanded' => false,
                'placeholder' => 'Sélectionner un choix'
            ])
            ->add('personage', EntityType::class, [
                'class' => Personage::class,
                'choice_label' => 'name',
                'constraints' => [new NotBlank(['message' => 'Ce champ ne peut être vide'])],
                'label' => 'Nom du personage',
                'expanded' => false,
                'placeholder' => 'Sélectionner un choix'
            ])
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
