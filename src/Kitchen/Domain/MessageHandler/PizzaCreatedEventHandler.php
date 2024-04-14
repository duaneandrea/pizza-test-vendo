<?php

namespace App\Kitchen\Domain\MessageHandler;

use App\Kitchen\Domain\Entity\PizzaInventory;
use App\Kitchen\Domain\Event\PizzaCreatedEvent;
use App\Repository\Kitchen\Domain\Entity\PizzaInventoryRepository;
use App\Repository\Storage\Domain\Entity\InventoryRepository;

class PizzaCreatedEventHandler
{
    public function __construct(private PizzaInventoryRepository $pizzaInventoryRepository)
    {
    }

    public function __invoke(PizzaCreatedEvent $event)
    {
        $pizza = $event->getPizza();
        $pizzaInventory = $this->pizzaInventoryRepository->findBy(['pizza'=>$pizza]) ?? new PizzaInventory();
        //check if the pizza exist in the inventory
        if($pizzaInventory?->getId()== null){
            $pizzaInventory->setPizza($pizza);
            $pizzaInventory->setStockLevel(1);
            $pizzaInventory->setReorderThreshhold(5);
        }else{
            $pizzaInventory->setStockLevel($pizzaInventory->getStockLevel()+1);
        }




    }
}