<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\RetraitRepository;

#[ORM\Entity(repositoryClass: RetraitRepository::class)]
#[ApiResource]
class Retrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'retraits')]
    private ?client $numerodeCompte = null;

    #[ORM\Column(length: 8)]
    private ?string $numerodeCheque = null;

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
