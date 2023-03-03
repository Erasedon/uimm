<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $annee = null;

    #[ORM\Column]
    private ?int $taux = null;

    #[ORM\ManyToOne(inversedBy: 'stats')]
    private ?Formation $obtenir_formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getTaux(): ?int
    {
        return $this->taux;
    }

    public function setTaux(int $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getObtenirFormation(): ?Formation
    {
        return $this->obtenir_formation;
    }

    public function setObtenirFormation(?Formation $obtenir_formation): self
    {
        $this->obtenir_formation = $obtenir_formation;

        return $this;
    }
}
