<?php

namespace App\Entity;

use App\Entity\Client;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\RetraitRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RetraitRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)]
class Retrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['read', 'write'])]
    #[ORM\ManyToOne(targetEntity: Client::class,inversedBy: 'retraits')]
    private ?client $numerodeCompte = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 8)]
    private ?string $numerodeCheque = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column]
    private ?int $montantdeRetrait = null;

    #[ORM\Column(length: 255)]
    private ?string $datedeRetrait = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerodeCompte(): ?client
    {
        return $this->numerodeCompte;
    }

    public function setNumerodeCompte(?client $numerodeCompte): self
    {
        $this->numerodeCompte = $numerodeCompte;

        return $this;
    }

    public function getNumerodeCheque(): ?string
    {
        return $this->numerodeCheque;
    }

    public function setNumerodeCheque(string $numerodeCheque): self
    {
        $this->numerodeCheque = $numerodeCheque;

        return $this;
    }

    public function getMontantdeRetrait(): ?int
    {
        return $this->montantdeRetrait;
    }

    public function setMontantdeRetrait(int $montantdeRetrait): self
    {
        $this->montantdeRetrait = $montantdeRetrait;

        return $this;
    }

    public function getDatedeRetrait(): ?string
    {
        return $this->datedeRetrait;
    }

    public function setDatedeRetrait(string $datedeRetrait): self
    {
        $this->datedeRetrait = $datedeRetrait;

        return $this;
    }
}
