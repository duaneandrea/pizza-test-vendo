<?php

namespace App\Kitchen\Domain\Event;

use App\Kitchen\Domain\Entity\Pizza;

class PizzaCreatedEvent
{
    private Pizza $pizza;
    public const NAME = "pizza_created";

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}