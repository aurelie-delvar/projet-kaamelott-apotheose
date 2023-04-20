<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Personage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'acteur'
            ])
            ->add('picture', TextType::class, [
                'label' => 'Image'
            ])
            ->add('descriptionPicture', TextType::class, [
                'label' => 'Description de l\'image'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de l\'acteur'
            ])
            ->add('personage', EntityType::class, [
                'class' => Personage::class,
                'label' => 'Personnage associé',
                'choice_label' => 'name',
                'expanded' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
            'attr' => [
                'novalidate' => 'novalidate', // desactive the html5 validation
            ]
        ]);
    }
}
