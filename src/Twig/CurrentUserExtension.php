<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class CurrentUserExtension extends AbstractExtension
{
    
    // private $entityManager;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        // $this -> entityManager = $entityManager;
        $this -> security = $security;

    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('currentUser', [$this, 'getUser']),
        ];
    }

    public function getUser()
    {
        return $this -> security ->getUser();

    }
}
