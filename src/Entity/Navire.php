<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NavireRepository::class)]
class Navire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    #[Assert\Regex]
    private ?string $IMO = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 9)]
    private ?string $MMSI = null;

    #[ORM\Column(length: 10)]
    private ?string $IndicatifDappel = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Eta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIMO(): ?string
    {
        return $this->IMO;
    }

    public function setIMO(string $IMO): static
    {
        $this->IMO = $IMO;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMMSI(): ?string
    {
        return $this->MMSI;
    }

    public function setMMSI(string $MMSI): static
    {
        $this->MMSI = $MMSI;

        return $this;
    }

    public function getIndicatifDappel(): ?string
    {
        return $this->IndicatifDappel;
    }

    public function setIndicatifDappel(string $IndicatifDappel): static
    {
        $this->IndicatifDappel = $IndicatifDappel;

        return $this;
    }

    public function getEta(): ?\DateTimeInterface
    {
        return $this->Eta;
    }

    public function setEta(\DateTimeInterface $Eta): static
    {
        $this->Eta = $Eta;

        return $this;
    }
}
