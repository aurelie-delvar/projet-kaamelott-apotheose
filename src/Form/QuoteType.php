<?php

namespace App\Form;

use App\Entity\Quote;
use App\Entity\User;
use App\Entity\Personage;
use App\Entity\Episode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text' , TextareaType::class, [
                'label'=> 'Texte'
            ])
            ->add('rating',ChoiceType::class, [
                'label' => 'Rating',
                'choices'  => [
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    ]
            ])
            ->add('validated', ChoiceType::class, [
                'label' => 'Validée?',
                'choices'  => [
                    'Non' => false,
                    'Oui' => true,
                    ]
            ])
            ->add('episode',EntityType::class, [
                'class' => Episode::class,
                'choice_label' => 'title',
                'label' => 'Titre de l\'épisode',
                'expanded' => false,
                'required' => false
            ])
            ->add('personage',EntityType::class, [
                'class' => Personage::class,
                'choice_label' => 'name',
                'label' => 'Nom du personage',
                'expanded' => false,
                'required' => false
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'label' => 'Utilisateur',
                'expanded' => false,
                'required' => false
               ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quote::class,
        ]);
    }
}
