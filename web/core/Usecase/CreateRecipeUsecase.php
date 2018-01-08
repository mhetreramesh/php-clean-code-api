<?php declare(strict_types = 1);

namespace Core\Usecase;

use Core\Adapter\RecipeRepositoryInterface;

class CreateRecipeUsecase
{
    protected $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function execute($data)
    {
        $recepieId = $this->recipeRepository->save('recipes', $data);
        $recepie = $this->recipeRepository->find('recipes', $recepieId);
        return $recepie;
    }
}