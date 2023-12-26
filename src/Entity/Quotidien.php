<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use App\Repository\QuotidienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuotidienRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['quotidien:read']],
    denormalizationContext: ['groups' => ['quotidien:write']]
)]
#[ApiFilter(SearchFilter::class, properties: ['date' => 'exact', "User.id"=>'exact' ] )]
class Quotidien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'quotidiens')]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?User $User = null;

    #[ORM\OneToMany(mappedBy: 'quotidien', targetEntity: DetailQuotidien::class)]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private Collection $detailQuotidien;

    public function __construct()
    {
        $this->detailQuotidien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, DetailQuotidien>
     */
    public function getDetailQuotidien(): Collection
    {
        return $this->detailQuotidien;
    }

    public function addDetailQuotidien(DetailQuotidien $detailQuotidien): static
    {
        if (!$this->detailQuotidien->contains($detailQuotidien)) {
            $this->detailQuotidien->add($detailQuotidien);
        }

        return $this;
    }

    public function removeDetailQuotidien(DetailQuotidien $detailQuotidien): static
    {
        if ($this->detailQuotidien->removeElement($detailQuotidien)) {
            // set the owning side to null (unless already changed)
         
        }

        return $this;
    }
}