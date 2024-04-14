<?php

namespace App\Kitchen\Domain\Entity;

use App\Repository\Kitchen\Domain\Entity\IngredientRepository;
use App\SalesAndPromotion\Domain\Entity\PizzaPrice;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $size = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'piza')]
    private ?Ingredient $ingridients = null;

    #[ORM\OneToMany(mappedBy: 'pizza', targetEntity: PizzaInventory::class)]
    private Collection $pizzaInventories;

    #[ORM\OneToMany(mappedBy: 'pizza', targetEntity: PizzaPrice::class)]
    private Collection $pizzaPrices;

    public function __construct()
    {
        $this->pizzaInventories = new ArrayCollection();
        $this->pizzaPrices = new ArrayCollection();
    }

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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

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

    /**
     * @return Collection<int, PizzaInventory>
     */
    public function getPizzaInventories(): Collection
    {
        return $this->pizzaInventories;
    }

    public function addPizzaInventory(PizzaInventory $pizzaInventory): static
    {
        if (!$this->pizzaInventories->contains($pizzaInventory)) {
            $this->pizzaInventories->add($pizzaInventory);
            $pizzaInventory->setPizza($this);
        }

        return $this;
    }

    public function removePizzaInventory(PizzaInventory $pizzaInventory): static
    {
        if ($this->pizzaInventories->removeElement($pizzaInventory)) {
            // set the owning side to null (unless already changed)
            if ($pizzaInventory->getPizza() === $this) {
                $pizzaInventory->setPizza(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PizzaPrice>
     */
    public function getPizzaPrices(): Collection
    {
        return $this->pizzaPrices;
    }

    public function addPizzaPrice(PizzaPrice $pizzaPrice): static
    {
        if (!$this->pizzaPrices->contains($pizzaPrice)) {
            $this->pizzaPrices->add($pizzaPrice);
            $pizzaPrice->setPizza($this);
        }

        return $this;
    }

    public function removePizzaPrice(PizzaPrice $pizzaPrice): static
    {
        if ($this->pizzaPrices->removeElement($pizzaPrice)) {
            // set the owning side to null (unless already changed)
            if ($pizzaPrice->getPizza() === $this) {
                $pizzaPrice->setPizza(null);
            }
        }

        return $this;
    }
}
