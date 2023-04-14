<?php

namespace App\Form;

use App\Entity\Rate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rating', ChoiceType::class, [
                'choices'  => [
                    'Excellent' => 5,
                    'Très bon' => 4,
                    'Bon'  => 3,
                    'Peut mieux faire' => 2,
                    'Nul' => 1
                ],
                'multiple' => false,
                'expanded' => false,
            ])
            // ->add('quote')
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rate::class,
            'attr' =>[
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
