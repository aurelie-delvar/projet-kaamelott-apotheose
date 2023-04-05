# BDD

## bdd_test.sql (fichier supprimer le 03/04/2023 car plus utile suite à la création des Entity)

Le fichier `bdd_test.sql` sera utilisé pour la partie Front, en attendant de créer les Entity sous symfony.
Dans ce fichier, il y a les requêtes permettant la création des tables et l'ajout des données.

Il suffit d'aller sur Adminer, créer une BDD puis d'importer ce fichier.

## kaamelott_bdd.sql

Le fichier `kaamelott_bdd.sql` est notre base de données.
Dans ce fichier, il y a les requêtes permettant la création des tables et l'ajout des données.

Il suffit d'aller sur Adminer, créer une BDD (si pas déjà créée) puis d'importer ce fichier.

## iconographie.md

Le fichier `iconographie.md` sert à recenser les liens des images.

Pour information, les données concernant les images des personnages et acteurs seront disponible directement dans la BDD (table `actor` et `personage`).

## dossier requetes-SQL

Ce dossier servira à alimenter la base de données lorsque nous auront créé les tables sous symfony.

Attention, il faudra utiliser les requêtes en fonction de leur relation pour éviter des erreurs.
Par exemple :

- en premier: injecter les données dans les tables n'ayant pas de relation
- en deuxième: injecter les données dans les tables ayant des relations avec des tables ayant déjà des données insérées
