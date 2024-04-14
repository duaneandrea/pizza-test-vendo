<?php

namespace App\Kitchen\Domain\Entity;

use App\Repository\Kitchen\Domain\Entity\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?Ingredient $ingridients = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $steps = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIngridients(): ?Ingredient
    {
        return $this->ingridients;
    }

    public function setIngridients(?Ingredient $ingridients): static
    {
        $this->ingridients = $ingridients;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(?string $steps): static
    {
        $this->steps = $steps;

        return $this;
    }
}
