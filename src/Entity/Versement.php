<?php

namespace App\Entity;

use App\Entity\Client;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\VersementRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VersementRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)]
class Versement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['read', 'write'])]
    #[ORM\ManyToOne(targetEntity: Client::class,inversedBy: 'versements')]
    private ?client $numerodeCompte = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column]
    private ?int $MontantVerser = null;

    #[Groups(['read', 'write'])]
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
