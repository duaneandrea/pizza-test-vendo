<?php

namespace App\Kitchen\Domain\Entity;

use App\Repository\Kitchen\Domain\Entity\PizzaInventoryRepository;
use App\Storage\Domain\Entity\Inventory;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaInventoryRepository::class)]
class PizzaInventory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pizzaInventories')]
    private ?Pizza $pizza = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stockLevel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reorderThreshhold = null;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Inventory::class)]
    private Collection $inventories;

    public function __construct()
    {
        $this->inventories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizza(): ?Pizza
    {
        return $this->pizza;
    }

    public function setPizza(?Pizza $pizza): static
    {
        $this->pizza = $pizza;

        return $this;
    }

    public function getStockLevel(): ?string
    {
        return $this->stockLevel;
    }

    public function setStockLevel(?string $stockLevel): static
    {
        $this->stockLevel = $stockLevel;

        return $this;
    }

    public function getReorderThreshhold(): ?string
    {
        return $this->reorderThreshhold;
    }

    public function setReorderThreshhold(?string $reorderThreshhold): static
    {
        $this->reorderThreshhold = $reorderThreshhold;

        return $this;
    }

    /**
     * @return Collection<int, Inventory>
     */
    public function getInventories(): Collection
    {
        return $this->inventories;
    }

    public function addInventory(Inventory $inventory): static
    {
        if (!$this->inventories->contains($inventory)) {
            $this->inventories->add($inventory);
            $inventory->setItem($this);
        }

        return $this;
    }

    public function removeInventory(Inventory $inventory): static
    {
        if ($this->inventories->removeElement($inventory)) {
            // set the owning side to null (unless already changed)
            if ($inventory->getItem() === $this) {
                $inventory->setItem(null);
            }
        }

        return $this;
    }
}
