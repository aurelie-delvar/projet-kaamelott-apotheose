# pagination

installer le bundle pagination :

```bash
composer require knplabs/knp-paginator-bundle
```

dans notre controller :

```php

use Knp\Component\Pager\PaginatorInterface;


    /**
     * @Route("/", name="app_backoffice_episode_browse", methods={"GET"})
     */
    public function browse(EpisodeRepository $episodeRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $episodeRepository->paginationQuery(),
            $request->query->get('page', 1),
            10
        );

        return $this->render('backoffice/episode/browse.html.twig', [
            'pagination' => $pagination
        ]);
    }
```

dans notre repository

```php
public function paginationQuery()
    {
       return $this->createQueryBuilder('e')
           ->orderBy('e.id', 'ASC')
           ->getQuery()
       ;
    }
```

dans notre twig

```php
            {% for episode in pagination %}
                <tr>
                <th scope="row">{{ episode.id }}</th>
                    <td>{{ episode.title }}</td>
                    <td>{{ episode.number }}</td>
                    <td>
                        <a href="{{ path('app_backoffice_episode_read', {'id': episode.id}) }}" class="btn btn-success">voir</a>
                        <a href="{{ path('app_backoffice_episode_edit', {'id': episode.id}) }}" class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan="4">Pas de résultat.</td>
                </tr>
            {% endfor %}
```

pour afficher les boutons :

```php
{{ knp_pagination_render(pagination) }}
```

la pagination est fonctionnelle mais moche !

créer un fichier paginator.yaml et mettre dedans

```md
knp_paginator:
    page_range: 2
    template:
        pagination: "@KnpPaginator/Pagination/twitter_bootstrap_v3_pagination.html.twig"
```

attention penser à vider le cache pour que cela s'affiche

```bash
bin/console cache:clear
```

https://www.youtube.com/watch?v=iEatWLAShVA&ab_channel=izicode
https://www.youtube.com/watch?v=2EMU9TYzvB0&ab_channel=Pentiminax vers la min 12
https://www.youtube.com/watch?v=93ZDC_67Wes&list=WL&index=100 explication pour le "page_range: 2
