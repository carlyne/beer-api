<?php

namespace App\Entity;

use App\Repository\MaltQuantityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaltQuantityRepository::class)
 */
class MaltQuantity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $quantity = null;

    /**
     * @ORM\ManyToOne(targetEntity=Malt::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Malt $malt = null;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="malts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getMalt(): ?Malt
    {
        return $this->malt;
    }

    public function setMalt(?Malt $malt): self
    {
        $this->malt = $malt;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }
}
