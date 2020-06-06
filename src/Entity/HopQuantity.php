<?php

namespace App\Entity;

use App\Repository\HopQuantityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HopQuantityRepository::class)
 */
class HopQuantity
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
     * @ORM\ManyToOne(targetEntity=Hop::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Hop $hop = null;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="hops")
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

    public function getHop(): ?Hop
    {
        return $this->hop;
    }

    public function setHop(?Hop $hop): self
    {
        $this->hop = $hop;

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
