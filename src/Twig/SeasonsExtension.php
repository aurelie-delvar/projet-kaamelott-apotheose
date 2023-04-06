<?php

namespace App\Twig;

use App\Entity\Season;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;


// i'm trying to make the season list accessible everywhere, so this is an extension built with the maker
class SeasonsExtension extends AbstractExtension
{
    private $em;

    // we'll need the constructor
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('seasonsList', [$this, 'getSeasons']), // "seasonsList" is the name giver to the function, it will be used in the yaml
        ];
    }

    public function getSeasons()
    {
        // we seek SeasonRepository thanks to the entity Manager and we ask for the findAll
        return $this->em->getRepository(Season::class)->findAll();
    }
}
