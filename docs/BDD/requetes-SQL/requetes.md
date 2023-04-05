# Création d'une requête SQL (pour injecter des données dans Adminer)

## Dans VSCode

### Création d'un fichier nomRequete.sql

Il faut créér un fichier `nomRequete.sql` (vous pouvez créer un fichier pour toutes les requêtes ou un par requête)

### création de la requête

Dans ce fichier, il suffit de mettre la requête que l'on souhaite.

Dans cet exemple, je veux implémenter la table `Personage`.

Les -- (en vert) servent pour les commentaires.

Attention, le nom des propriétés de la table doivent être nommé exactement comme dans Adminer.

Par exemple:

- lors de la création de l'Entity sous symfony, la propriété est écrite en CamelCase (descriptionPicture)
- par contre dans Adminer, la propriété est écrite en snake_case (description_picture)

```sql
--
-- Structure de la table `personage` (visible sur Adminer)
-- id => int, Auto Increment
-- name => string (64)
-- picture => string (128), NULL
-- description_picture => text, NULL
-- description => text, NULL
-- actor_id => Foreign Key
--
```

```sql
INSERT INTO -- pour insérer
`nomDeLaTable` -- préciser le nom de la table dans laquelle on souhaite ajouter les données
(`id`,`name`, `picture`,`description_picture`, `description`, `actor_id`) -- mettre le nom des champs dont nous souhaitons remplir avec les données. le champ ID n'est pas obligatoire s'il est auto-incrémenté. 
VALUES -- pour indiquer quelle valeur nous souhaitons mettre
(1,"Angharad", NULL, NULL, NULL, 1),
(2,"Anna", NULL, NULL, "blablabla",2);
```

Les valeurs doivent être misent dans l'ordre du nom des champs :

- id => 1,
- name => "Angharad",
- picture => NULL,
- description_picture => NULL,
- description => NULL,
- actor_id => 1

Les items doivent être séparés par une virgule sauf le dernier qui se termine avec un point-virgule.

## Dans Adminer

La base de donnée, les tables et les relations doivent être créées avant d'exécuter les requêtes.

Les requêtes doivent être injectés selon une hiérarchie.

- En 1er: les tables ne possédant pas de clés étrangères
- En 2ème: les tables ayant des clés étrangères dont leurs tables ont été implémenté
- En 3ème: le reste

### 1ère possibilité

Cette possibilité est pratique pour les requêtes courtes, car nous sommes limités en taille pour la commande `SQL Command`.

Copier la requête et la coller dans Adminer -> SQL Command puis cliquer sur `execute`.

### 2ème possibilité (recommandé)

Sur Adminer, aller dans `Import`, sélectionner un fichier (il suffit de chercher votre fichier `nomRequete.sql`) et de cliquer sur `execute`
