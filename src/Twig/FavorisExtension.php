<?php

namespace App\Twig;

use App\Entity\Favorite;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class FavorisExtension extends AbstractExtension
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('favoris', [$this, 'getFavoris']),
        ];
    }

    public function getFavoris()
    {
        return $this->em->getRepository(Favorite::class)->findAll();
    }
}
