# Kaamel'O'tt

Kaamel'O'tt est un site web destiné aux amateurs de la série télévisée française Kaamelott. Le site a pour but de rassembler la communauté des fans autour d'une passion commune : se divertir et se remémorer les moments cultes de la série.
Bref, c'est une bonne dose de bonne humeur 😄

## Fonctionnalités

### Partie Front

Le front-office est accessible aux visiteurs et contient des informations sur la série, les personnages, les citations et les saisons/épisodes.

Pour accèder à d'autres fonctionnalités, le visiteur doit se créer un compte ou se connecter. Une fois connecté, il pourra jouer à un quizz pour tester leurs connaissances sur la série, proposer une citation, mettre des citations en favoris et noter les citations.

### Partie Back

Le back-office est accessible uniquement aux managers et administrateurs et sert à gérer le site et ses contenus.

Les managers et les administrateurs peuvent consulter les listes de personnages, d'épisodes, d'acteurs, de citations, etc., voir les détails d'un item en particulier, l'éditer, en ajouter un nouveau ou le supprimer (uniquement les administrateur).

### Rôles

- visiteur = utilisateur non connecté
- USER = utilisateur connecté ayant accès uniquement à la partie Front
- MANAGER = utilisateur connecté ayant accès à tout le Front et au Back sauf pour les suppression
- ADMIN = utilisateur connecté ayant accès à tout le Front et le Back

## Technologies utilisées

Le site est développé en utilisant les technologies web suivantes :

- HTML, CSS, Bootstrap, Twig pour la partie frontend
- JavaScript pour l'API du quizz
- Symfony et Twig pour la partie backend
- MariaDB pour la base de données

## Déploiement

Le site sera déployé uniquement pour présenter notre projet lors de l'apothéose et pour le passage du Titre Pro.

N'ayant pas obtenu les droits de diffusion des images, nous avons pris la décision de ne pas déployer notre site au public.

## Installation

- Cloner le repo GitHub : `git@github.com:O-clock-Nazca/projet-13-kaamelott.git`
- Utiliser la commande : `composer install`
- Créer une base de données sur Adminer
- Créer un fichier : `.env.local` : mettre le nom de la BDD, l'utilisateur et son mot de passe
- Importer le fichier de la base de données `kaamelott.sql` dans Adminer. Ce fichier ce trouve dans `PROJET-13-KAAMELOTT/docs/BDD/`.
- Lancer le serveur PHP pour lancer le site : `php -S 0.0.0.0:8000 -t public`
