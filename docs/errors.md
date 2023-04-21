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

## Cannot validate values of type "string" automatically. Please provide a constraint

Je souhaite ajouter le score dans la table `PlayQuizz`.
L'erreur se situe dans mon controller car je tente d'ajouter un objet JSON `jsonContent` au lieu de récupérer mon objet JSON désérialisé.
Il suffit d'ajouter une variable `scoreFromJson` contenant ma désérialisation.

```php
//function add dans le PlayQuizzController

$jsonContent = $request->getContent();
        //dump($jsonContent);
        try {
            $scoreFromJson = $serializer->deserialize(
                $jsonContent,
                PlayQuizz::class,
                'json',
            );
        } catch (\Throwable $error){
            return $this->json(
                [
                    "message" => $error->getMessage()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        } 
```

## Return value of App\Repository\PlayQuizzRepository::displayScore1() must be of the type array, bool returned

J'ai cette erreur lorsque l'utilisateur n'a pas joué à un quizz lors de l'affichage du score dans le profil utilisateur.

## You cannot refresh a user from the EntityUserProvider that does not contain an identifier. The user object has to be serialized with its own identifier mapped by Doctrine

J'ai cette erreur lorsque je souhaite supprimer mon identifiant depuis le backoffice.
C'est normal, lorsqu'un utilisateur est supprimé, on est redirigé vers la page browse user de backoffice.

Pour corriger cette erreur, j'ai ajouté cette condition.

```php

// I had to add these lines because a error occured due to the session still standing
        if ($this->getUser() == $user){
            $request->getSession()->invalidate();
            $this->container->get('security.token_storage')->setToken(null);
    
            return $this->redirectToRoute('default', [], Response::HTTP_SEE_OTHER);
        }

```

## Executing script cache:clear [KO]

avec un git pull en déploiement, on ne récupérait pas toutes les modifications, en faisant un ```composer install``` on avait l'erreur ci dessous qui apparaissait :

```bash

Executing script cache:clear [KO]
 [KO]
Script cache:clear returned with error code 1
!!  [critical] Error thrown while running command "--ansi cache:clear". Message: "Unable to write in the "/var/www/html/projet-13-kaamelott/var/cache/prod" directory."
!!
!!
!!    Unable to write in the "/var/www/html/projet-13-kaamelott/var/cache/prod" d
!!    irectory.
!!
!!
!!  cache:clear [--no-warmup] [--no-optional-warmers]
!!
!!
Script @auto-scripts was called via post-install-cmd
```

merci à Baptiste et en demandant à chat GPT on a tenté la commande : pour modifier les droits en écriture

```bash
sudo chmod -R 777 /var/www/html/projet-13-kaamelott/var/cache/
```

```bash
composer install
```

```bash
git pull
```

et tout est bien récupéré