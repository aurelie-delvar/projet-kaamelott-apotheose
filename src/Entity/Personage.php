<?php

namespace App\Entity;

//use App\Entity\Actor;

use App\Repository\PersonageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity(repositoryClass=PersonageRepository::class)
 * @UniqueEntity(
 *     fields={"actor"},
 *     message="Cet acteur a déjà un personnage attribué. Merci de choisir un autre acteur."
 * )
 */
class Personage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @assert\NotBlank (message= "Le nom du personnage doit être renseigné")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionPicture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Quote::class, mappedBy="personage")
     */
    private $quotes;

    /**
     * @ORM\OneToOne(targetEntity=Actor::class, inversedBy="personage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $actor;

    /**
     * @ORM\Column(type="boolean")
     *  
     */
    private $creditOrder;



    public function __construct()
    {
        $this->quotes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescriptionPicture(): ?string
    {
        return $this->descriptionPicture;
    }

    public function setDescriptionPicture(?string $descriptionPicture): self
    {
        $this->descriptionPicture = $descriptionPicture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Quote>
     */
    public function getQuotes(): Collection
    {
        return $this->quotes;
    }

    public function addQuote(Quote $quote): self
    {
        if (!$this->quotes->contains($quote)) {
            $this->quotes[] = $quote;
            $quote->setPersonage($this);
        }

        return $this;
    }

    public function removeQuote(Quote $quote): self
    {
        if ($this->quotes->removeElement($quote)) {
            // set the owning side to null (unless already changed)
            if ($quote->getPersonage() === $this) {
                $quote->setPersonage(null);
            }
        }

        return $this;
    }

    public function getActor(): ?Actor
    {
        return $this->actor;
    }

    public function setActor(?Actor $actor): self
    {
        $this->actor = $actor;

        return $this;
    }

    public function isCreditOrder(): ?bool
    {
        return $this->creditOrder;
    }

    public function setCreditOrder(bool $creditOrder): self
    {
        $this->creditOrder = $creditOrder;

        return $this;
    }

 
}
