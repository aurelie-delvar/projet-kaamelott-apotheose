<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizzRepository::class)
 */
class Quizz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="quizz")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity=PlayQuizz::class, mappedBy="quizz")
     */
    private $playQuizzs;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->playQuizzs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setQuizz($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getQuizz() === $this) {
                $question->setQuizz(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayQuizz>
     */
    public function getPlayQuizzs(): Collection
    {
        return $this->playQuizzs;
    }

    public function addPlayQuizz(PlayQuizz $playQuizz): self
    {
        if (!$this->playQuizzs->contains($playQuizz)) {
            $this->playQuizzs[] = $playQuizz;
            $playQuizz->setQuizz($this);
        }

        return $this;
    }

    public function removePlayQuizz(PlayQuizz $playQuizz): self
    {
        if ($this->playQuizzs->removeElement($playQuizz)) {
            // set the owning side to null (unless already changed)
            if ($playQuizz->getQuizz() === $this) {
                $playQuizz->setQuizz(null);
            }
        }

        return $this;
    }
}