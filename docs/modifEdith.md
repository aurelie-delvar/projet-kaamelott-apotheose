# modifications effectuées ou à faire

## pour Quote

### pour le rating : modif à faire sur la BDD et l'entité quote pour le rating il faut passer en float:

```php
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;
```

```php
    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
```

### pour éviter les répétitions : création d'un template _card_quote.html.twig

pour l'utiliser ou l'on veut remplacer la carte citation par : {% include '_card_quote.html.twig' %}

Attention il faut absolument une variable quote, peut etre définit juste avant : par exmple ici pour la citation random

```php
{% set quote = randomQuote %}
    {% include '_card_quote.html.twig' %}

```

## pour Saisons

j'aurais besoin de conseils de la part d'Angèle pour ajouter une description à l'entité season sans tout "péter".

exemple récupéré sur wikipédia donc certainement à modifier :

livre 1 : "Le château de Kaamelott est achevé, la cour est établie, les choses sérieuses peuvent commencer. Une grande table ronde est construite, autour de laquelle les chevaliers se réuniront pour organiser la Quête du Graal, diriger le royaume, narrer leurs aventures victorieuses pour la gloire des dieux et du peuple. Tous les éléments sont réunis pour mener à bien la Quête. Du moins en théorie, car en pratique, le roi Arthur réalise bien vite que ceux qui l’entourent, s’ils ne manquent pas de motivation, ne vont pas toujours dans le même sens que lui, ni à la même vitesse."

livre 2 : "Les chevaliers sont bien installés dans leurs rôles, le gouvernement est en place et stable, le royaume est régulièrement sous la menace d’incursions barbares, mais l’unification des clans permet à l’armée de repousser les tentatives les unes après les autres. Le roi Arthur fait du mieux qu’il peut pour composer avec l’équipe disparate et passablement incompétente qui est supposée le seconder dans sa tâche ; les quêtes s’accomplissent avec plus ou moins de succès. Mais les prémices d’éléments dévastateurs font leur apparition : les relations deviennent de plus en plus tumultueuses entre le roi et son fidèle second, Lancelot, et la vie amoureuse du roi Arthur, peu flamboyante, ne l’aide pas à surmonter son désespoir chronique."

livre 3 : "La situation ne s'arrange guère entre le roi Arthur et Lancelot. Le premier ne supporte plus que difficilement le rigorisme et l’élitisme du second, qui répond par le mépris à la souplesse dont fait preuve — selon lui — le roi dans sa façon de gouverner. Pour ne rien arranger, le roi Arthur s’éprend de dame Mevanwi, la femme du chevalier Karadoc ; commence alors une cour discrète et illicite, au regard de la loi et des dieux."
livre 4 : "L’irréparable s’est produit : Lancelot est entré en rébellion. Il a définitivement quitté la cour de Kaamelott et la Table ronde pour mener sa propre Quête du Graal, à sa manière et en totale opposition avec Arthur, sans toutefois entreprendre une action militaire à son encontre. Pire, la passion adultère d’Arthur pour dame Mevanwi a eu une conséquence imprévue : la reine Guenièvre a, elle aussi, déserté et rejoint son amant Lancelot dans le reniement, ce qui vaut à la Dame du Lac d'être bannie par les dieux. Soutenue militairement et financièrement par le roi Loth, toujours prêt à la traîtrise, la déchirure s’étend à tout le gouvernement, les chevaliers devant prendre parti pour le renégat ou le roi tout en acceptant son mariage interdit avec dame Mevanwi."

livre 5 : "La faute est réparée, Arthur s’est séparé de dame Mevanwi et a libéré Guenièvre de l’emprise de Lancelot, refaisant d’elle sa reine. Mais la situation ne peut plus guère s’améliorer. Lancelot a complètement disparu, et si certains le disaient fou et prétendent que la fuite de son amante l’a poussé à mettre fin à ses jours, Arthur est durement marqué par la disparition de l’homme qui a autrefois été son plus fidèle allié et ami. Lorsque sa mère et ses beaux-parents réclament du roi qu’il replante Excalibur dans le rocher pour rappeler au peuple qu’il est l’élu, Arthur s’exécute à contre-cœur avant de réaliser qu’une occasion s’offre à lui de changer le cours déplorable qu’a pris son existence."

livre 6 : "Quinze ans avant les événements narrés dans la série Kaamelott. Arthur n’est encore qu’un simple soldat de la milice urbaine romaine ; plutôt solitaire, sentimental, guère ambitieux et sans grand avenir, il n’attend pas grand-chose de sa vie au sein d’un empire sur le déclin, mais les dieux et le Sénat en ont décidé autrement : le milicien anonyme va s’élever, jusqu’à devenir une des figures légendaires les plus célèbres de l’histoire. Le dernier épisode, Dies Iræ, reprend le cours de l'histoire là où elle s'était arrêtée à la fin du Livre V."
