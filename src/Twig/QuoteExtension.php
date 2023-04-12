<?php

namespace App\Twig;

use App\Entity\Quote;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;

class QuoteExtension extends AbstractExtension
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('quote', [$this, 'getQuotes']),
        ];
    }

    public function getQuotes()
    {
        return $this->em->getRepository(Quote::class)->findAll();
    }
}
