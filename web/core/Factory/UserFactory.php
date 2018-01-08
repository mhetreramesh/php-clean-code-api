<?php declare(strict_types = 1);

namespace Core\Factory;

use Core\Usecase\CreateRecipeUsecase;
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
}