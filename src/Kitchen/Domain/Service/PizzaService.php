<?php

namespace App\Kitchen\Domain\Service;

use App\Kitchen\Domain\Entity\Pizza;
use App\Kitchen\Domain\Event\PizzaCreatedEvent;
use App\Repository\Kitchen\Domain\Entity\IngredientRepository;
use App\Repository\Kitchen\Domain\Entity\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class PizzaService implements PizzaInterface
{

    public function __construct(private EntityManagerInterface $entityManager, private IngredientRepository $ingredientRepository, private PizzaRepository $pizzaRepository, private EventDispatcherInterface $eventDispatcher)
    {
    }

    public function createPizza(Request $request, FormInterface $form)
    {
        if($form->isSubmitted() && $form->isValid()){
            $name = $form->get('name')->getData();
            $description = $form->get('description')->getData();
            $size = $form->get('size')->getData();
            $price = $form->get('price')->getData();
            $ingredients = $form->get('ingredients')->getData();

            $pizza = new Pizza();
            $pizza->setName($name);
            $pizza->setDescription($description);
            $pizza->setSize($size);
            $pizza->setPrice($price);
            $pizza->setIngridients($this->ingredientRepository->find($ingredients));

            try {
                $this->entityManager->persist($pizza);
                $this->entityManager->flush();
                $event = new PizzaCreatedEvent($pizza);
                $this->eventDispatcher->dispatch($event, PizzaCreatedEvent::NAME);
                return
                    [
                        'status'=>'success',
                        'msg'=>'The pizza was created successfully'
                    ];
            }catch (\Exception $exception){
                return
                    [
                        'status'=>'error',
                        'msg'=>$exception->getMessage()
                    ];
            }

        }
    }

    public function showAllPizza()
    {
        return $this->pizzaRepository->findAll();
    }

    public function showSinglePizza($id)
    {
        return $this->pizzaRepository->find($id);
    }


    public function updatePizza(Pizza $pizza)
    {
        //update the pizza
    }

    public function deletePizza(Pizza $pizza)
    {
        //delete a pizza
    }
}