<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero()
     */
    private ?int $mashTime = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero()
     */
    private ?int $boilingTime = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero()
     */
    private ?int $abv = null;

    /**
     * @ORM\OneToMany(targetEntity=MaltQuantity::class, mappedBy="recipe", orphanRemoval=true)
     */
    private Collection $malts;

    /**
     * @ORM\OneToMany(targetEntity=HopQuantity::class, mappedBy="recipe", orphanRemoval=true)
     */
    private Collection $hops;

    /**
     * @ORM\ManyToOne(targetEntity=Yeast::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Yeast $yeast = null;

    /**
     * @ORM\ManyToOne(targetEntity=BeerType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?BeerType $type = null;

    public function __construct()
    {
        $this->malts = new ArrayCollection();
        $this->hops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMashTime(): ?int
    {
        return $this->mashTime;
    }

    public function setMashTime(int $mashTime): self
    {
        $this->mashTime = $mashTime;

        return $this;
    }

    public function getBoilingTime(): ?int
    {
        return $this->boilingTime;
    }

    public function setBoilingTime(int $boilingTime): self
    {
        $this->boilingTime = $boilingTime;

        return $this;
    }

    public function getAbv(): ?int
    {
        return $this->abv;
    }

    public function setAbv(int $abv): self
    {
        $this->abv = $abv;

        return $this;
    }

    /**
     * @return Collection|MaltQuantity[]
     */
    public function getMalts(): Collection
    {
        return $this->malts;
    }

    public function addMalt(MaltQuantity $malt): self
    {
        if (!$this->malts->contains($malt)) {
            $this->malts[] = $malt;
            $malt->setRecipe($this);
        }

        return $this;
    }

    public function removeMalt(MaltQuantity $malt): self
    {
        if ($this->malts->contains($malt)) {
            $this->malts->removeElement($malt);
            // set the owning side to null (unless already changed)
            if ($malt->getRecipe() === $this) {
                $malt->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HopQuantity[]
     */
    public function getHops(): Collection
    {
        return $this->hops;
    }

    public function addHop(HopQuantity $hop): self
    {
        if (!$this->hops->contains($hop)) {
            $this->hops[] = $hop;
            $hop->setRecipe($this);
        }

        return $this;
    }

    public function removeHop(HopQuantity $hop): self
    {
        if ($this->hops->contains($hop)) {
            $this->hops->removeElement($hop);
            // set the owning side to null (unless already changed)
            if ($hop->getRecipe() === $this) {
                $hop->setRecipe(null);
            }
        }

        return $this;
    }

    public function getYeast(): ?Yeast
    {
        return $this->yeast;
    }

    public function setYeast(?Yeast $yeast): self
    {
        $this->yeast = $yeast;

        return $this;
    }

    public function getType(): ?BeerType
    {
        return $this->type;
    }

    public function setType(?BeerType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
