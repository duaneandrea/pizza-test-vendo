<?php
namespace App\Kitchen\Domain\RepositoryInterface;

interface IngredientRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null);

    public function findAll();
}