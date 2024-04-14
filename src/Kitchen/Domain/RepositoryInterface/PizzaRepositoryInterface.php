<?php
namespace App\Kitchen\Domain\RepositoryInterface;

interface PizzaRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null);

    public function findAll();
}