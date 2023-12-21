<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\DetailQuotidienRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailQuotidienRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['detail:read']],
    denormalizationContext: ['groups' => ['detail:write']]

)
]
class DetailQuotidien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity:"Quotidien",cascade:["persist"]  )]
    #[Groups(['detail:read', 'detail:write'  ])]
    private ?Quotidien $quotidien = null;

    #[ORM\ManyToOne(targetEntity:"Activites",cascade:["persist"]  )]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?Activites $Activite = null;

    #[ORM\ManyToOne ]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?Projet $projet = null;

    #[ORM\Column]
    #[Groups([ 'quotidien:read', 'quotidien:write', 'detail:read', 'detail:write'  ])]
    private ?float $duree = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuotidien(): ?Quotidien
    {
        return $this->quotidien;
    }

    public function setQuotidien(?Quotidien $quotidien): static
    {
        $this->quotidien = $quotidien;

        return $this;
    }

    public function getActivite(): ?Activites
    {
        return $this->Activite;
    }

    public function setActivite(?Activites $Activite): static
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): static
    {
        $this->projet = $projet;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): static
    {
        $this->duree = $duree;

        return $this;
    }
}
