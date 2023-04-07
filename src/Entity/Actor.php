<?php

namespace App\Entity;

// use assert\NotBlank;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ActorRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ActorRepository::class)
 * 
 */
class Actor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank (message= "Ce champ doit être rempli.")
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
     * @ORM\OneToOne(targetEntity=Personage::class, mappedBy="actor", cascade={"persist", "remove"})
     */
    private $personage;

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

    public function getPersonage(): ?Personage
    {
        return $this->personage;
    }

    public function setPersonage(?Personage $personage): self
    {
        // unset the owning side of the relation if necessary
        if ($personage === null && $this->personage !== null) {
            $this->personage->setActor(null);
        }

        // set the owning side of the relation if necessary
        if ($personage !== null && $personage->getActor() !== $this) {
            $personage->setActor($this);
        }

        $this->personage = $personage;

        return $this;
    }
}
