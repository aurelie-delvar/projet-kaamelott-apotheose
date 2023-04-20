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

## Could not convert database value "USER" to Doctrine Type json

Je souhaite afficher mes utilisateurs dans mon formulaire `edit` (sur Quote).

L'erreur vient des données mal renseignées dans Adminer. La donnée était renseignée en string `USER` au lieu de `["ROLE_USER"]`.

Solution:
Il suffit de modifier les données dans la table `User` sur Adminer

```sql
["ROLE_USER"]
["ROLE_ADMIN"]
["ROLE_MANAGER"]
```

## mauvaise nomination de la branche ???

non ce n'est pas ça erreur toujours presente malgré le renomage,
au départ j'avais ce nom "Author/AvatarController" je l'ai changé en me disant que ça pouvait venir de là "AuthorContoller-AvatarController" nouveau nom... mais ça ne change rien fait "composer install"  puis "composer require --dev symfony/maker-bundle" comme conseillé dans le mess d'erreur si je vais sur ma branche Rating sur laquelle j'ai bossé hier je peux faire mon ma:crud ...

```bash
student@teleporter:/var/www/html/apotheose/projet-13-kaamelott$ git checkout Author/AvatarController 
Switched to branch 'Author/AvatarController'
student@teleporter:/var/www/html/apotheose/projet-13-kaamelott$ bin/console ma:crud
[critical] Error thrown while running command "'ma:crud'". Message: "There are no commands defined in the "ma" namespace.

Did you mean one of these?
    doctrine:mapping
    doctrine:schema"

                                                        
  There are no commands defined in the "ma" namespace.  
                                                        
  Did you mean one of these?                            
      doctrine:mapping                                  
      doctrine:schema                                   
                                                        
```

## An exception occurred while executing a query: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`kaamelott`.`quote`, CONSTRAINT `FK_6B71CBF4EA8E3E4A` FOREIGN KEY (`personage_id`) REFERENCES `personage` (`id`))

Lorsque je souhaite supprimer un personnage, j'ai cette erreur.

C'est normal, j'ai une relation (OneToOne) avec la table actor.

Pour corriger cette erreur, il faut aller sur adminer.

Dans la table personnage (porteuse de la clé étrangère), mettre la clé étrangère en `CASCADE` sur le `ON DELETE`.
Cela supprimera le personnage et l'acteur associé.
