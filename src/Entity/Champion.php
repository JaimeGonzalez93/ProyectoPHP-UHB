<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChampionRepository::class)]
class Champion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'text')]
    private $lore;

    #[ORM\Column(type: 'text')]
    private $passive;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $passiveImg;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $qHability;

    #[ORM\Column(type: 'text')]
    private $qDescription;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $wHability;

    #[ORM\Column(type: 'text', nullable: true)]
    private $wDescription;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eHability;

    #[ORM\Column(type: 'text')]
    private $eDescription; 

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rHability;

    #[ORM\Column(type: 'text')]
    private $rDescription;

    #[ORM\ManyToOne(inversedBy: 'champions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;

        return $this;
    }

    public function getPassive(): ?string
    {
        return $this->passive;
    }

    public function setPassive(string $passive): self
    {
        $this->passive = $passive;

        return $this;
    }

    public function getPassiveImg(): ?string
    {
        return $this->passiveImg;
    }

    public function setPassiveImg(string $passiveImg): self
    {
        $this->passiveImg = $passiveImg;

        return $this;
    }

    public function getQHability(): ?string
    {
        return $this->qHability;
    }

    public function setQHability(string $qHability): self
    {
        $this->qHability = $qHability;

        return $this;
    }

    public function getQDescription(): ?string
    {
        return $this->qDescription;
    }

    public function setQDescription(string $qDescription): self
    {
        $this->qDescription = $qDescription;

        return $this;
    }

    public function getWHability(): ?string
    {
        return $this->wHability;
    }

    public function setWHability(string $wHability): self
    {
        $this->wHability = $wHability;

        return $this;
    }

    public function getWDescription(): ?string
    {
        return $this->wDescription;
    }

    public function setWDescription(string $wDescription): self
    {
        $this->wDescription = $wDescription;

        return $this;
    }

    public function getEHability(): ?string
    {
        return $this->eHability;
    }

    public function setEHability(string $eHability): self
    {
        $this->eHability = $eHability;

        return $this;
    }

    public function getEDescription(): ?string
    {
        return $this->eDescription;
    }

    public function setEDescription(string $eDescription): self
    {
        $this->eDescription = $eDescription;

        return $this;
    }

    public function getRHability(): ?string
    {
        return $this->rHability;
    }

    public function setRHability(string $rHability): self
    {
        $this->rHability = $rHability;

        return $this;
    }

    public function getRDescription(): ?string
    {
        return $this->rDescription;
    }

    public function setRDescription(string $rDescription): self
    {
        $this->rDescription = $rDescription;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }
}
