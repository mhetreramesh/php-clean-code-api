<?php declare(strict_types = 1);

namespace Core\Factory;

use Core\Usecase\GetAllRecipesUsecase;
use Core\Usecase\GetRecipeUsecase;
use Core\Repository\RecipeRepository;

/*
*   This is the factory to give access to all usecases who doesn't require athenticated
*/

class GuestFactory
{
    public static function getRecipes()
    {
        return new GetAllRecipesUsecase(
            new RecipeRepository()
        );
    }

    public static function getRecipe()
    {
        return new GetRecipeUsecase(
            new RecipeRepository()
        );
    }
}