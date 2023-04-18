<?php

namespace App\Twig;

use App\Entity\Personage;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class CharactersExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('charactersVIP', [$this, 'getCharacters']),
        ];
    }

    public function getCharacters()
    {
        return $this->em->getRepository(Personage::class)->findBy(["creditOrder" => 0]);
    }
}
