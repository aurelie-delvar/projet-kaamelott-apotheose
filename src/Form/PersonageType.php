<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Personage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',EntityType::class,[
                'class' => Personage::class,
                'choice_label' =>'name',
                'label' => 'Nom du personnage'])
            ->add('picture',EntityType::class,[
                'class' => Personage::class,
                'choice_label' =>'picture',
                'label' => 'Image'])
            ->add('descriptionPicture',EntityType::class,[
                'class' => Personage::class,
                'choice_label' =>'descriptionPicture',
                'label' => 'Description de l\'image'])
            ->add('description',EntityType::class,[
                'class' => Personage::class,
                'choice_label' =>'description',
                'label' => 'Description du personnage'])
            ->add('actor', EntityType::class, [
                // ! ne pas oublier de dire de quelle entité en parle
                'class' => Actor::class,
                // ! Object of class App\Entity\Genre could not be converted to string
                // je dois préciser quelle propriété doit être afficher dans la liste déroulante
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
