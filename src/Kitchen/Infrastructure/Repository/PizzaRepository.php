<?php
namespace App\Kitchen\Infrastructure\Repository;

use App\Domain\Interface\IngredientRepositoryInterface;
use App\Kitchen\Domain\RepositoryInterface\PizzaRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class PizzaRepository extends EntityRepository implements PizzaRepositoryInterface
{

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        // TODO: Implement find() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }
}