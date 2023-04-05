<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Personage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('picture')
            ->add('descriptionPicture')
            ->add('description')
            ->add('actor', EntityType::class, [
                // ! ne pas oublier de dire de quelle entité en parle
                'class' => Actor::class,
                // ! Object of class App\Entity\Genre could not be converted to string
                // je dois préciser quelle propriété doit être afficher dans la liste déroulante
                'choice_label' => 'name',
                //'multiple' => true,
                'expanded' => false,
                'required' => false
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personage::class,
        ]);
    }
}
