<?php declare(strict_types = 1);

namespace Core\Factory;

use Core\Usecase\CreateRecipeUsecase;
use Core\Usecase\UpdateRecipeUsecase;
use Core\Usecase\DeleteRecipeUsecase;
use Core\Repository\RecipeRepository;

/*
*   This is the factory to give access to all usecases who require authentication
*/

class UserFactory
{
    public static function createRecipe()
    {
        return new CreateRecipeUsecase(
            new RecipeRepository()
        );
    }

    public static function updateRecipe()
    {
        return new UpdateRecipeUsecase(
            new RecipeRepository()
        );
    }

    public static function deleteRecipe()
    {
        return new DeleteRecipeUsecase(
            new RecipeRepository()
        );
    }
}