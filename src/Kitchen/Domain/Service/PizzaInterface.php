<?php

namespace App\Kitchen\Domain\Service;

use App\Kitchen\Domain\Entity\Pizza;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

interface PizzaInterface
{
    public function createPizza(Request $request, FormInterface $form);
    public function showAllPizza();
    public function showSinglePizza($id);
    public function updatePizza(Pizza $pizza);
    public function deletePizza(Pizza $pizza);
}