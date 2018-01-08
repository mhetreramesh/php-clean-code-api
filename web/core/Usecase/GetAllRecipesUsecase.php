<?php declare(strict_types = 1);

namespace Core\Usecase;

use Core\Adapter\RecipeRepositoryInterface;

class GetAllRecipesUsecase
{
    protected $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function execute($query = NULL, $order = NULL, $orderDirection = 'DESC', $limit = null, $offset = null)
    {
        return $this->recipeRepository->findBy('recipes', $query, $order, $orderDirection, $limit, $offset);
    }
}