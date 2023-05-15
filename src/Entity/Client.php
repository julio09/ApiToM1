<?php

namespace App\Entity;

use App\Entity\Retrait;
use App\Entity\Versement;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use App\Repository\ClientRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Doctrine\Odm\Filter\RangeFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;



#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
)]
#[ApiFilter(RangeFilter::class, properties: ['Solde'])]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $id = null;
    
    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255, unique:true)]
    private ?string $NumerodeCompte = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column]
    private ?int $Solde = null;

    #[Groups(['read'])]
    #[ORM\OneToMany(mappedBy: 'numerodeCompte', targetEntity: Versement::class,cascade:['all'], orphanRemoval: true)]
    private Collection $versements;

    #[Groups(['read'])]
    #[ORM\OneToMany(mappedBy: 'numerodeCompte', targetEntity: Retrait::class, cascade: ['all'], orphanRemoval: true)]
    private Collection $retraits;

    public function __construct()
    {
        $this->versements = new ArrayCollection();
        $this->retraits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerodeCompte(): ?string
    {
        return $this->NumerodeCompte;
    }

    public function setNumerodeCompte(string $NumerodeCompte): self
    {
        $this->NumerodeCompte = $NumerodeCompte;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->Solde;
    }

    public function setSolde(int $Solde): self
    {
        $this->Solde = $Solde;

        return $this;
    }

    /**
     * @return Collection<int, Versement>
     */
    public function getVersements(): Collection
    {
        return $this->versements;
    }

    public function addVersement(Versement $versement): self
    {
        if (!$this->versements->contains($versement)) {
            $this->versements->add($versement);
            $versement->setNumerodeCompte($this);
        }

        return $this;
    }

    public function removeVersement(Versement $versement): self
    {
        if ($this->versements->removeElement($versement)) {
            // set the owning side to null (unless already changed)
            if ($versement->getNumerodeCompte() === $this) {
                $versement->setNumerodeCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Retrait>
     */
    public function getRetraits(): Collection
    {
        return $this->retraits;
    }

    public function addRetrait(Retrait $retrait): self
    {
        if (!$this->retraits->contains($retrait)) {
            $this->retraits->add($retrait);
            $retrait->setNumerodeCompte($this);
        }

        return $this;
    }

    public function removeRetrait(Retrait $retrait): self
    {
        if ($this->retraits->removeElement($retrait)) {
            // set the owning side to null (unless already changed)
            if ($retrait->getNumerodeCompte() === $this) {
                $retrait->setNumerodeCompte(null);
            }
        }

        return $this;
    }
}
