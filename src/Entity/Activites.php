<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ActivitesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitesRepository::class)]
#[ApiResource(
    shortName:'Activite'
)]
class Activites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['detail:read', 'detail:write'  ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([ 'quotidien:read',  'detail:read', 'detail:write'  ])]
    private ?string $nomActivite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups([ 'quotidien:read',  'detail:read', 'detail:write'  ])]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([ 'quotidien:read',  'detail:read', 'detail:write'  ])]
    private ?string $typeActivite = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([ 'quotidien:read',  'detail:read', 'detail:write'  ])]
    private ?string $categorieActivite = null;

    #[ORM\Column]
    private ?bool $archivee = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActivite(): ?string
    {
        return $this->nomActivite;
    }

    public function setNomActivite(string $nomActivite): static
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeActivite(): ?string
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(?string $typeActivite): static
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    public function getCategorieActivite(): ?string
    {
        return $this->categorieActivite;
    }

    public function setCategorieActivite(?string $categorieActivite): static
    {
        $this->categorieActivite = $categorieActivite;

        return $this;
    }

    public function isArchivee(): ?bool
    {
        return $this->archivee;
    }

    public function setArchivee(bool $archivee): static
    {
        $this->archivee = $archivee;

        return $this;
    }
}
