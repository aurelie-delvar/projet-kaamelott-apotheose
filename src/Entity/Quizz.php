<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"quizz_read", "playQuizz_browse", "playQuizz_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank (message= "Ce champ doit être rempli.")]
     * @Groups({"quizz_read", "playQuizz_browse","playQuizz_read"})
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="quizz")
     * @Groups({"quizz_read"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity=PlayQuizz::class, mappedBy="quizz")
     */
    private $playQuizz;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->playQuizz = new ArrayCollection();
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
    public function getPlayQuizz(): Collection
    {
        return $this->playQuizz;
    }

    public function addPlayQuizz(PlayQuizz $playQuizz): self
    {
        if (!$this->playQuizz->contains($playQuizz)) {
            $this->playQuizz[] = $playQuizz;
            $playQuizz->setQuizz($this);
        }

        return $this;
    }

    public function removePlayQuizz(PlayQuizz $playQuizz): self
    {
        if ($this->playQuizz->removeElement($playQuizz)) {
            // set the owning side to null (unless already changed)
            if ($playQuizz->getQuizz() === $this) {
                $playQuizz->setQuizz(null);
            }
        }

        return $this;
    }
}
