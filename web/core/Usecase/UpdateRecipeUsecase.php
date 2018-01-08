<?php declare(strict_types = 1);

namespace Core\Usecase;

use Core\Adapter\RecipeRepositoryInterface;

class UpdateRecipeUsecase
{
    protected $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function execute($id, $data)
    {
        $recepie = $this->recipeRepository->find('recipes', $id);
        if($recepie->id !== $id) {
            //ToDo: Need to return error with proper error handler service
            return [];
        }
        return $this->recipeRepository->update($recepie, $data);
    }
}