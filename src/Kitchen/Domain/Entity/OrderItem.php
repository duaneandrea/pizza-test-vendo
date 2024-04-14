<?php

namespace App\Kitchen\Domain\Entity;

use App\Repository\Kitchen\Domain\Entity\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
class OrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    private ?Order $singleOrder = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    private ?Pizza $pizza = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(length: 512)]
    private ?string $specialInstructions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSingleOrder(): ?Order
    {
        return $this->singleOrder;
    }

    public function setSingleOrder(?Order $singleOrder): static
    {
        $this->singleOrder = $singleOrder;

        return $this;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSpecialInstructions(): ?string
    {
        return $this->specialInstructions;
    }

    public function setSpecialInstructions(string $specialInstructions): static
    {
        $this->specialInstructions = $specialInstructions;

        return $this;
    }
}
