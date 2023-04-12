<?php

namespace App\Twig;

use App\Entity\Quizz;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

// i'm trying to make the quizz list accessible everywhere, so this is an extension built with the maker (bin/console make:twig-extension)
class QuizzsExtension extends AbstractExtension
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
            new TwigFunction('quizzsList', [$this, 'getQuizzs']), // "quizzsList" is the name giver to the function, it will be used in the yaml
        ];
    }

    public function getQuizzs()
    {
        // we seek QuizzRepository thanks to the entity Manager and we ask for the findAll
        return $this->em->getRepository(Quizz::class)->findAll();
    }
}
