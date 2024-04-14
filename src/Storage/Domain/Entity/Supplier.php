<?php

namespace App\Storage\Domain\Entity;

use App\Kitchen\Domain\Entity\Ingredient;
use App\Procurement\Domain\Entity\PurchaseOrder;
use App\Repository\Storage\Domain\Entity\SupplierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupplierRepository::class)]
class Supplier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactInfo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deliverySchedule = null;

    #[ORM\OneToMany(mappedBy: 'supplier', targetEntity: PurchaseOrder::class)]
    private Collection $purchaseOrders;

    #[ORM\OneToMany(mappedBy: 'supplier', targetEntity: Ingredient::class)]
    private Collection $ingredients;

    public function __construct()
    {
        $this->purchaseOrders = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
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

    public function getContactInfo(): ?string
    {
        return $this->contactInfo;
    }

    public function setContactInfo(?string $contactInfo): static
    {
        $this->contactInfo = $contactInfo;

        return $this;
    }

    public function getDeliverySchedule(): ?string
    {
        return $this->deliverySchedule;
    }

    public function setDeliverySchedule(?string $deliverySchedule): static
    {
        $this->deliverySchedule = $deliverySchedule;

        return $this;
    }

    /**
     * @return Collection<int, PurchaseOrder>
     */
    public function getPurchaseOrders(): Collection
    {
        return $this->purchaseOrders;
    }

    public function addPurchaseOrder(PurchaseOrder $purchaseOrder): static
    {
        if (!$this->purchaseOrders->contains($purchaseOrder)) {
            $this->purchaseOrders->add($purchaseOrder);
            $purchaseOrder->setSupplier($this);
        }

        return $this;
    }

    public function removePurchaseOrder(PurchaseOrder $purchaseOrder): static
    {
        if ($this->purchaseOrders->removeElement($purchaseOrder)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrder->getSupplier() === $this) {
                $purchaseOrder->setSupplier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): static
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients->add($ingredient);
            $ingredient->setSupplier($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): static
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getSupplier() === $this) {
                $ingredient->setSupplier(null);
            }
        }

        return $this;
    }
}
