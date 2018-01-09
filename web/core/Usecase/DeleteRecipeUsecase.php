<?php declare(strict_types = 1);

namespace Core\Usecase;

use Core\Adapter\RecipeRepositoryInterface;

class DeleteRecipeUsecase
{
    protected $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function execute($id)
    {
        $recipe = $this->recipeRepository->find('recipes', $id);
        if(empty($recipe) || $recipe->id !== $id) {
            //ToDo: Need to return error with proper error handler service
            return [];
        }
        return $this->recipeRepository->remove($recipe);
    }
}