<?php
namespace App\Kitchen\Infrastructure\Repository;

use App\Kitchen\Domain\RepositoryInterface\IngredientRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class IngredientRepository extends EntityRepository implements IngredientRepositoryInterface
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