<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Season;
use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre de l\'épisode'
            ])
           
            ->add('number')
            
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name',
                'label' => 'Nom de l\'auteur',
                'expanded' => false,
                'required' => false
            ])
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'Title',
                'label' => 'Titre de la saison',
                'expanded' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
            'attr' =>[
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
