<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="L'adresse est déjà utilisée")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"playQuizz_browse", "playQuizz_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * 
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "L'adresse mail '{{ value }}' n'est pas valide."
     * )
     * @Groups({"playQuizz_browse", "playQuizz_read"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * 
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * 
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Quote::class, mappedBy="user")
     */
    private $quotes;

    /**
     * @ORM\ManyToOne(targetEntity=Avatar::class, inversedBy="users")
     */
    private $avatar;

    
    /**
     * @ORM\OneToMany(targetEntity=Rate::class, mappedBy="user")
     */
    private $rates;

    /**
     * @ORM\OneToMany(targetEntity=PlayQuizz::class, mappedBy="user")
     * 
     */
    private $playQuizz;

    /**
     * @ORM\ManyToMany(targetEntity=Quote::class, inversedBy="users", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $favoriteQuote;

    public function __construct()
    {
        $this->quotes = new ArrayCollection();
        $this->rates = new ArrayCollection();
        $this->playQuizz = new ArrayCollection();
        $this->favoriteQuote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        // $roles[] = '';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $quote->setUser($this);
        }

        return $this;
    }

    public function removeQuote(Quote $quote): self
    {
        if ($this->quotes->removeElement($quote)) {
            // set the owning side to null (unless already changed)
            if ($quote->getUser() === $this) {
                $quote->setUser(null);
            }
        }

        return $this;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(?Avatar $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    

    /**
     * @return Collection<int, Rate>
     */
    public function getRates(): Collection
    {
        return $this->rates;
    }

    public function addRate(Rate $rate): self
    {
        if (!$this->rates->contains($rate)) {
            $this->rates[] = $rate;
            $rate->setUser($this);
        }

        return $this;
    }

    public function removeRate(Rate $rate): self
    {
        if ($this->rates->removeElement($rate)) {
            // set the owning side to null (unless already changed)
            if ($rate->getUser() === $this) {
                $rate->setUser(null);
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
            $playQuizz->setUser($this);
        }

        return $this;
    }

    public function removePlayQuizz(PlayQuizz $playQuizz): self
    {
        if ($this->playQuizz->removeElement($playQuizz)) {
            // set the owning side to null (unless already changed)
            if ($playQuizz->getUser() === $this) {
                $playQuizz->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Quote>
     */
    public function getFavoriteQuote(): Collection
    {
        return $this->favoriteQuote;
    }

    public function addFavoriteQuote(Quote $favoriteQuote): self
    {
        if (!$this->favoriteQuote->contains($favoriteQuote)) {
            $this->favoriteQuote[] = $favoriteQuote;
        }

        return $this;
    }

    public function removeFavoriteQuote(Quote $favoriteQuote): self
    {
        $this->favoriteQuote->removeElement($favoriteQuote);

        return $this;
    }
}
