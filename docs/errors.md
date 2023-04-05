# Fichiers comportant les erreurs rencontrées

## Expected argument of type "App\Entity\Quizz or null", "instance of Doctrine\Common\Collections\ArrayCollection" given at property path "quizz"

J'ai eu cette erreur car dans le fichier `QuestionType.php`, j'ai mis `multiple` a `true` au lieu de `false`:

```php
public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('answer1')
            ->add('answer2')
            ->add('answer3')
            ->add('answer4')
            ->add('goodAnswer')
            ->add('quizz', EntityType::class, [
                'class' => Quizz::class,
                'choice_label' => 'title',
                'multiple' => false,
                'expanded' => false,
            ])
        ;
    }
```
