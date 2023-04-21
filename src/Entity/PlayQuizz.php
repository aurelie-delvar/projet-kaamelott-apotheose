<?php

namespace App\Entity;

use App\Repository\PlayQuizzRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PlayQuizzRepository::class)
 */
class PlayQuizz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Quizz::class, inversedBy="playQuizz")
     * @Groups({"playQuizz_browse", "playQuizz_read"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $quizz;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="playQuizz")
     * @Groups({"playQuizz_browse", "playQuizz_read"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Groups({"playQuizz_browse", "playQuizz_read"})
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuizz(): ?Quizz
    {
        return $this->quizz;
    }

    public function setQuizz(?Quizz $quizz): self
    {
        $this->quizz = $quizz;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }
}
