<?php declare(strict_types = 1);

namespace Core\Factory;

use Core\Usecase\GetAllRecipesUsecase;
use Core\Usecase\GetRecipeUsecase;
use Core\Repository\RecipeRepository;

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