<?php

namespace App\Entity;

use App\Repository\VersementRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: VersementRepository::class)]
#[ApiResource]
class Versement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'versements')]
    private ?client $numerodeCompte = null;

    #[ORM\Column]
    private ?int $MontantVerser = null;

    #[ORM\Column(length: 10)]
    private ?string $dateVersement = null;

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

    public function getMontantVerser(): ?int
    {
        return $this->MontantVerser;
    }

    public function setMontantVerser(int $MontantVerser): self
    {
        $this->MontantVerser = $MontantVerser;

        return $this;
    }

    public function getDateVersement(): ?string
    {
        return $this->dateVersement;
    }

    public function setDateVersement(string $dateVersement): self
    {
        $this->dateVersement = $dateVersement;

        return $this;
    }
}
