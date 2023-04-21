<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Personage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('name', TextType::class,[                               
                'label' => 'Nom'])

            ->add('picture',TextType::class,[                
                'label' => 'Image'])

            ->add('descriptionPicture',TextType::class,[
                    'label' => 'Description de l\'image'])

            ->add('description',TextareaType::class,[
                'label' => 'Description du personnage'])

            ->add('actor', EntityType::class, [
                // ! do not forget to say of which entity we are talking
                'class' => Actor::class,
                // ! Object of class App\Entity\Genre could not be converted to string
                // I have to specify which property should be displayed in the drop-down list
                'choice_label' => 'name',
                'label' => 'Nom de l\'acteur',
                'expanded' => false,
                'required' => false 
            ])

            ->add('credit_order', ChoiceType::class, [
                'label' => 'Importance du personnage',
                'choices'  => [     
                    'Personnages principaux' => false,
                    'Personnages secondaire' => true,
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personage::class,
            'attr' =>[
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
