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

## Object of class Proxies\__CG__\App\Entity\Avatar could not be converted to string

Il ne reconnait pas mon `user.avatar` dans mon fichier twig browse (user)

Solution : mettre une condition pour afficher l'avatar uniquement s'il n'est pas null

```php
<td>
    {% if user.avatar is not null %}
        {{ user.avatar.name }}
    {% endif %}
</td>
```
