<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resume = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?int $duree_heure = null;

    #[ORM\Column(nullable: true)]
    private ?int $duree_hentreprise = null;

    #[ORM\Column(length: 50)]
    private ?string $duree_mois = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Condition::class, inversedBy: 'formations')]
    private Collection $posseder_condition;

    #[ORM\ManyToMany(targetEntity: FraisScolarite::class, inversedBy: 'formations')]
    private Collection $remunerer;

    #[ORM\ManyToMany(targetEntity: TypeFormation::class, inversedBy: 'formations')]
    private Collection $effectuer_type_formation;

    #[ORM\OneToMany(mappedBy: 'obtenir_formation', targetEntity: Stats::class)]
    private Collection $stats;

    #[ORM\ManyToMany(targetEntity: Domaine::class, inversedBy: 'formations')]
    private Collection $appartenir_domaine;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveau $niveau = null;

    #[ORM\ManyToMany(targetEntity: MetierVise::class, inversedBy: 'formations')]
    private Collection $viser_metier;

    #[ORM\ManyToMany(targetEntity: CodeFormation::class, inversedBy: 'formations')]
    private Collection $identifier_formation;

    #[ORM\ManyToMany(targetEntity: Lieu::class, inversedBy: 'formations')]
    private Collection $situer;

    #[ORM\Column]
    private ?bool $actif = null;

    public function __construct()
    {
        $this->posseder_condition = new ArrayCollection();
        $this->remunerer = new ArrayCollection();
        $this->effectuer_type_formation = new ArrayCollection();
        $this->stats = new ArrayCollection();
        $this->appartenir_domaine = new ArrayCollection();
        $this->viser_metier = new ArrayCollection();
        $this->identifier_formation = new ArrayCollection();
        $this->situer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDureeHeure(): ?int
    {
        return $this->duree_heure;
    }

    public function setDureeHeure(?int $duree_heure): self
    {
        $this->duree_heure = $duree_heure;

        return $this;
    }

    public function getDureeHentreprise(): ?int
    {
        return $this->duree_hentreprise;
    }

    public function setDureeHentreprise(?int $duree_hentreprise): self
    {
        $this->duree_hentreprise = $duree_hentreprise;

        return $this;
    }

    public function getDureeMois(): ?string
    {
        return $this->duree_mois;
    }

    public function setDureeMois(string $duree_mois): self
    {
        $this->duree_mois = $duree_mois;

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

    /**
     * @return Collection<int, Condition>
     */
    public function getPossederCondition(): Collection
    {
        return $this->posseder_condition;
    }

    public function addPossederCondition(Condition $possederCondition): self
    {
        if (!$this->posseder_condition->contains($possederCondition)) {
            $this->posseder_condition->add($possederCondition);
        }

        return $this;
    }

    public function removePossederCondition(Condition $possederCondition): self
    {
        $this->posseder_condition->removeElement($possederCondition);

        return $this;
    }

    /**
     * @return Collection<int, FraisScolarite>
     */
    public function getRemunerer(): Collection
    {
        return $this->remunerer;
    }

    public function addRemunerer(FraisScolarite $remunerer): self
    {
        if (!$this->remunerer->contains($remunerer)) {
            $this->remunerer->add($remunerer);
        }

        return $this;
    }

    public function removeRemunerer(FraisScolarite $remunerer): self
    {
        $this->remunerer->removeElement($remunerer);

        return $this;
    }

    /**
     * @return Collection<int, TypeFormation>
     */
    public function getEffectuerTypeFormation(): Collection
    {
        return $this->effectuer_type_formation;
    }

    public function addEffectuerTypeFormation(TypeFormation $effectuerTypeFormation): self
    {
        if (!$this->effectuer_type_formation->contains($effectuerTypeFormation)) {
            $this->effectuer_type_formation->add($effectuerTypeFormation);
        }

        return $this;
    }

    public function removeEffectuerTypeFormation(TypeFormation $effectuerTypeFormation): self
    {
        $this->effectuer_type_formation->removeElement($effectuerTypeFormation);

        return $this;
    }

    /**
     * @return Collection<int, Stats>
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stats $stat): self
    {
        if (!$this->stats->contains($stat)) {
            $this->stats->add($stat);
            $stat->setObtenirFormation($this);
        }

        return $this;
    }

    public function removeStat(Stats $stat): self
    {
        if ($this->stats->removeElement($stat)) {
            // set the owning side to null (unless already changed)
            if ($stat->getObtenirFormation() === $this) {
                $stat->setObtenirFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Domaine>
     */
    public function getAppartenirDomaine(): Collection
    {
        return $this->appartenir_domaine;
    }

    public function addAppartenirDomaine(Domaine $appartenirDomaine): self
    {
        if (!$this->appartenir_domaine->contains($appartenirDomaine)) {
            $this->appartenir_domaine->add($appartenirDomaine);
        }

        return $this;
    }

    public function removeAppartenirDomaine(Domaine $appartenirDomaine): self
    {
        $this->appartenir_domaine->removeElement($appartenirDomaine);

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection<int, MetierVise>
     */
    public function getViserMetier(): Collection
    {
        return $this->viser_metier;
    }

    public function addViserMetier(MetierVise $viserMetier): self
    {
        if (!$this->viser_metier->contains($viserMetier)) {
            $this->viser_metier->add($viserMetier);
        }

        return $this;
    }

    public function removeViserMetier(MetierVise $viserMetier): self
    {
        $this->viser_metier->removeElement($viserMetier);

        return $this;
    }

    /**
     * @return Collection<int, CodeFormation>
     */
    public function getIdentifierFormation(): Collection
    {
        return $this->identifier_formation;
    }

    public function addIdentifierFormation(CodeFormation $identifierFormation): self
    {
        if (!$this->identifier_formation->contains($identifierFormation)) {
            $this->identifier_formation->add($identifierFormation);
        }

        return $this;
    }

    public function removeIdentifierFormation(CodeFormation $identifierFormation): self
    {
        $this->identifier_formation->removeElement($identifierFormation);

        return $this;
    }

    /**
     * @return Collection<int, Lieu>
     */
    public function getSituer(): Collection
    {
        return $this->situer;
    }

    public function addSituer(Lieu $situer): self
    {
        if (!$this->situer->contains($situer)) {
            $this->situer->add($situer);
        }

        return $this;
    }

    public function removeSituer(Lieu $situer): self
    {
        $this->situer->removeElement($situer);

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }
}