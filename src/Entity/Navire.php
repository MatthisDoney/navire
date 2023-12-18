<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[Assert\Unique(fields: ['imo', 'mmsi', 'indicatifAppel'])]
#[ORM\Entity(repositoryClass: NavireRepository::class)]
#[ORM\Index(name: 'ind_IMO', columns: ['imo'])]
#[ORM\Index(name: 'ind_MMSI', columns: ['mmsi'])]
class Navire {

    #[Assert\Unique(fields: ['imo', 'mmsi', 'indicatifAppel'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;

    #[ORM\Column(name: 'imo', length: 7)]
    #[Assert\Regex('[1-9][0-9]{6}', message: 'le numéro IMO doit être unique et composé de 7 chiffres sans commencer par 0')]
    private ?string $IMO = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 9)]
    private ?string $MMSI = null;

    #[ORM\Column(name: 'indicatifappel', length: 10)]
    private ?string $IndicatifDappel = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Eta = null;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColumn(name: 'idaisshiptype', referencedColumnName: 'id', nullable: false)]
    private ?AisShipType $aisShipType = null;

    #[ORM\Column]
    private ?int $longueur = null;

    #[ORM\Column]
    private ?int $largeur = null;

    #[ORM\Column]
    private ?float $tirantdeau = null;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColum(name: 'idpays', referencedColumnName: 'id', nullable: false)]
    private ?Pays $pavillon = null;

    #[ORM\ManyToOne(inversedBy: 'navires',cascade:['persist'])]
    #[ORm\JoinColumn(name: 'idport', referencedColumnName: 'id',nullable: true)]
    private ?Port $idport = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getIMO(): ?string {
        return $this->IMO;
    }

    public function setIMO(string $IMO): static {
        $this->IMO = $IMO;

        return $this;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom): static {
        $this->nom = $nom;

        return $this;
    }

    public function getMMSI(): ?string {
        return $this->MMSI;
    }

    public function setMMSI(string $MMSI): static {
        $this->MMSI = $MMSI;

        return $this;
    }

    public function getIndicatifDappel(): ?string {
        return $this->IndicatifDappel;
    }

    public function setIndicatifDappel(string $IndicatifDappel): static {
        $this->IndicatifDappel = $IndicatifDappel;

        return $this;
    }

    public function getEta(): ?\DateTimeInterface {
        return $this->Eta;
    }

    public function setEta(\DateTimeInterface $Eta): static {
        $this->Eta = $Eta;

        return $this;
    }

    public function getAisShipType(): ?AisShipType {
        return $this->aisShipType;
    }

    public function setAisShipType(?AisShipType $aisShipType): static {
        $this->aisShipType = $aisShipType;

        return $this;
    }

    public function getLongueur(): ?int {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): static {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): static {
        $this->largeur = $largeur;

        return $this;
    }

    public function getTirantdeau(): ?float {
        return $this->tirantdeau;
    }

    public function setTirantdeau(float $tirantdeau): static {
        $this->tirantdeau = $tirantdeau;

        return $this;
    }

    public function getPavillon(): ?Pays {
        return $this->pavillon;
    }

    public function setPavillon(?Pays $pavillon): static {
        $this->pavillon = $pavillon;

        return $this;
    }

    public function getIdport(): ?Port
    {
        return $this->idport;
    }

    public function setIdport(?Port $idport): static
    {
        $this->idport = $idport;

        return $this;
    }
}
