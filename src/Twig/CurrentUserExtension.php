<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class CurrentUserExtension extends AbstractExtension
{
    
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;

    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('currentUser', [$this, 'getUser']),
        ];
    }

    public function getUser()
    {
        return $this->security->getUser();

    }
}
