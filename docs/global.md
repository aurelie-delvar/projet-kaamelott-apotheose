# Petit tuto sur comment rendre une variable globale avec Twig

/!\ Vidéo sur laquelle je m'appuie : https://youtu.be/HkeqxhAcJJY /!\

- Aller dans le twig.yaml
- En respectant l'indentation (très important), donner une nouvelle entrée nommée globals:
- Toujour en respectant l'indentation, donner le nom de la variable à rendre globale
  - PAR EXEMPLE :

```yaml
twig:
    globals:
        seasonsList: '@App\Twig\SeasonsExtension'
```

- Aller dans le dossier Twig dans src (ou le créer s'il n'existe pas) : on va créer une extension
- On fait un make:twig-extension avec le nom que l'on souhaite (ici, Seasons) et le fichier est créé !
- Pour ce qu'on va faire ici, on peut enlever le getFilters
- Par contre !!! On a besoin du constructeur pour y implenter le EntityManagerInterface
- Dans le getFunctions, on remplace dans le return le function_name par le nom que l'on donne à notre fonction (le même que dans le yaml), et le doSomething par le nom de la méthode sur laquelle on va coder et qui est juste en dessous. 
  - PAR EXEMPLE :

```php
    public function getFunctions(): array
    {
        return [
            new TwigFunction('seasonsList', [$this, 'getSeasons']),
        ];
    }
```

- Dans la méthode doSomething, on va chercher ce qui nous intéresse (par exemple, un findAll, ou findBy... D'où l'intérêt d'avoir l'entityManager)
- On en a presque fini, il faut qu'on revienne dans le yaml pour lui indiquer le namespace de notre Extension, pour qu'il sache où trouver sa variable
- Pour accéder à la liste des seasons : boucler comme ça :

```twig
{{ for season in seasonsList.getSeasons }}

{{ endfor }}
```
