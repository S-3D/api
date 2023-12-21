<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['quotidien:read', 'quotidien:write', 'detail:read', 'detail:write' ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: Quotidien::class)]
    private Collection $quotidiens;

    public function __construct()
    {
        $this->quotidiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection<int, Quotidien>
     */
    public function getQuotidiens(): Collection
    {
        return $this->quotidiens;
    }

    public function addQuotidien(Quotidien $quotidien): static
    {
        if (!$this->quotidiens->contains($quotidien)) {
            $this->quotidiens->add($quotidien);
            $quotidien->setUser($this);
        }

        return $this;
    }

    public function removeQuotidien(Quotidien $quotidien): static
    {
        if ($this->quotidiens->removeElement($quotidien)) {
            // set the owning side to null (unless already changed)
            if ($quotidien->getUser() === $this) {
                $quotidien->setUser(null);
            }
        }

        return $this;
    }
}
