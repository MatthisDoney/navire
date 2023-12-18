<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortRepository::class)]
#[ORM\Unique(fields:['indicatif'])]
#[ORM\Index(name:'ind_INDICATIF',columns:['indicatif'])]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'nom',length: 70)]
    private ?string $Nom = null;

    #[ORM\Column(name:'indicatif', length: 5)]
    #[ORM\Regex(pattern:"/[A-Z]{5}/", message:"L'indicatif Port a stritement 5 caractères")]
    private ?string $Indicatif = null;

    #[ORM\ManyToMany(targetEntity: AisShipType::class, inversedBy: 'portsCompatibles')]
    #[ORM\JoinTable(name:'porttypecompatible')]
    #[ORM\JoinColumn(name:'idport', referencedColumnName:'id')]
    private Collection $types;

    #[ORM\ManyToOne(inversedBy: 'ports')]
    #[ORM\JoinColumn(name:'idpays', nullable:false)]
    private ?pays $idpays = null;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getIndicatif(): ?string
    {
        return $this->Indicatif;
    }

    public function setIndicatif(string $Indicatif): static
    {
        $this->Indicatif = $Indicatif;

        return $this;
    }

    /**
     * @return Collection<int, AisShipType>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(AisShipType $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(AisShipType $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getIdpays(): ?pays
    {
        return $this->idpays;
    }

    public function setIdpays(?pays $idpays): static
    {
        $this->idpays = $idpays;

        return $this;
    }
}