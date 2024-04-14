<?php

namespace  App\Kitchen\Domain\Event;

use App\Kitchen\Domain\Entity\Ingredient;
use App\Shared\Event\DomainEventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class NewIngredientEvent extends Event implements DomainEventInterface
{

    protected \DateTimeImmutable $occur;

    protected Ingredient $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
        $this->occur = new \DateTimeImmutable();
    }

    public function getIngredient() : Ingredient
    {
        return $this->ingredient;
    }

    public function getOccur(): \DateTimeImmutable
    {
        return $this->occur;
    }
}