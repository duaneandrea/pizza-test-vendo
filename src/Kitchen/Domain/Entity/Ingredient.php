<?php
namespace  App\Kitchen\Domain\Entity;

use App\Kitchen\Infrastructure\Repository\IngredientRepository;
use App\Procurement\Domain\Entity\PurchaseOrderItem;
use App\Shared\Aggregate\AggregateRoot;
use App\Storage\Domain\Entity\Supplier;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient extends AggregateRoot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'ingridients', targetEntity: Pizza::class)]
    private \Doctrine\Common\Collections\Collection $piza;

    #[ORM\OneToMany(mappedBy: 'ingridients', targetEntity: Recipe::class)]
    private \Doctrine\Common\Collections\Collection $recipes;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: PurchaseOrderItem::class)]
    private \Doctrine\Common\Collections\Collection $purchaseOrderItems;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    private ?Supplier $supplier = null;

    public function __construct()
    {
        $this->piza = new ArrayCollection();
        $this->recipes = new ArrayCollection();
        $this->purchaseOrderItems = new ArrayCollection();
    }


    #[ManyToMany(targetEntity: Pizza::class, inversedBy: 'ingredients')]
    #[JoinTable(name: 'pizza_ingredients')]


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function create()
    {

    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Pizza>
     */
    public function getPiza(): \Doctrine\Common\Collections\Collection
    {
        return $this->piza;
    }

    public function addPiza(Pizza $piza): static
    {
        if (!$this->piza->contains($piza)) {
            $this->piza->add($piza);
            $piza->setIngridients($this);
        }

        return $this;
    }

    public function removePiza(Pizza $piza): static
    {
        if ($this->piza->removeElement($piza)) {
            // set the owning side to null (unless already changed)
            if ($piza->getIngridients() === $this) {
                $piza->setIngridients(null);
            }
        }

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Recipe>
     */
    public function getRecipes(): \Doctrine\Common\Collections\Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): static
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->setIngridients($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): static
    {
        if ($this->recipes->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getIngridients() === $this) {
                $recipe->setIngridients(null);
            }
        }

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, PurchaseOrderItem>
     */
    public function getPurchaseOrderItems(): \Doctrine\Common\Collections\Collection
    {
        return $this->purchaseOrderItems;
    }

    public function addPurchaseOrderItem(PurchaseOrderItem $purchaseOrderItem): static
    {
        if (!$this->purchaseOrderItems->contains($purchaseOrderItem)) {
            $this->purchaseOrderItems->add($purchaseOrderItem);
            $purchaseOrderItem->setItem($this);
        }

        return $this;
    }

    public function removePurchaseOrderItem(PurchaseOrderItem $purchaseOrderItem): static
    {
        if ($this->purchaseOrderItems->removeElement($purchaseOrderItem)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrderItem->getItem() === $this) {
                $purchaseOrderItem->setItem(null);
            }
        }

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

}