<?php

namespace App\Kitchen\Application\Controller;

use App\Kitchen\Application\Forms\CreatePizzaType;
use App\Kitchen\Domain\Service\PizzaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    public function __construct(private PizzaService $pizzaService)
    {
    }

    //show lists of all pizzas
    #[Route('/kitchen/pizza', name: 'app_kitchen_pizza_show')]
    public function index(): Response
    {
        $allPizzas = $this->pizzaService->showAllPizza();
        return $this->render('kitchen/frontend/pizza/show-pizzas.html.twig', [
            'data' => $allPizzas,
        ]);
    }

    #[Route('/kitchen/pizza-create', name: 'app_kitchen_pizza_create')]
    public function create(Request $request): Response
    {
        $form = $this->createForm(CreatePizzaType::class);
        $response = $this->pizzaService->createPizza($request,$form);
        return $this->render('kitchen/frontend/pizza/create-pizza.html.twig',[
            'createPizzaForm'=>$form->createView(),
        ]);
    }

    #[Route('/kitchen/pizza/{id}', name: 'app_kitchen_pizza_single_show')]
    public function showSinglePizza($id): Response
    {
        $response = $this->pizzaService->showSinglePizza($id);
        return $this->render('kitchen/frontend/pizza/show-pizza.html.twig',[
            'data'=>$response,
        ]);
    }

    


}
