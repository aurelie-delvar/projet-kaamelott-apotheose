<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class QuizzVoter extends Voter
{

    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === "QUIZZ"
        && $subject instanceof \App\Entity\Quizz;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        // retreive the user, authentified or not
        $user = $token->getUser();

        // checks if he's authentified (if yes, he's an instance of UserInterface)
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        return true;
    }
}
