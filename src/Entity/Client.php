<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter as FilterSearchFilter;
use ApiPlatform\Elasticsearch\Filter\OrderFilter as FilterOrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use App\Entity\Retrait;
use App\Entity\Versement;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource]
#[ApiFilter(FilterOrderFilter::class)]
#[ApiFilter(FilterSearchFilter::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $id = null;

    #[ORM\Column(length: 255, unique:true)]
    private ?string $NumerodeCompte = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column]
    private ?int $Solde = null;

    #[ORM\OneToMany(mappedBy: 'numerodeCompte', targetEntity: Versement::class)]
    private Collection $versements;

    #[ORM\OneToMany(mappedBy: 'numerodeCompte', targetEntity: Retrait::class)]
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
