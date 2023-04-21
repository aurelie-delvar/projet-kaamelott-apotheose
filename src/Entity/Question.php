<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Quizz::class, inversedBy="questions")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $quizz;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $answer1;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $answer2;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $answer3;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $answer4;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "Le titre de la saison doit comporter au moins {{ limit }} caractères"
     * )
     * 
     * @Groups({"quizz_read"})
     */
    private $goodAnswer;


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

    public function getQuizz(): ?Quizz
    {
        return $this->quizz;
    }

    public function setQuizz(?Quizz $quizz): self
    {
        $this->quizz = $quizz;

        return $this;
    }

    public function getAnswer1(): ?string
    {
        return $this->answer1;
    }

    public function setAnswer1(string $answer1): self
    {
        $this->answer1 = $answer1;

        return $this;
    }

    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    public function setAnswer2(string $answer2): self
    {
        $this->answer2 = $answer2;

        return $this;
    }

    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    public function setAnswer3(string $answer3): self
    {
        $this->answer3 = $answer3;

        return $this;
    }

    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    public function setAnswer4(string $answer4): self
    {
        $this->answer4 = $answer4;

        return $this;
    }

    public function getGoodAnswer(): ?string
    {
        return $this->goodAnswer;
    }

    public function setGoodAnswer(string $goodAnswer): self
    {
        $this->goodAnswer = $goodAnswer;

        return $this;
    }
}
