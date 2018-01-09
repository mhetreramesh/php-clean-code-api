<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\GetAllRecipesUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;

class GetAllRecipesUsecaseTest extends TestCase
{
    public function testGetAllRecipesUsecase()
    {
        $stub = $this->createMock(GetAllRecipesUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute());
    }

    public function testGetAllRecipesUsecaseFails()
    {
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('findBy')
             ->willReturn($this->getRecipes());
        $result = (new GetAllRecipesUsecase($stub))->execute();
        $this->assertNotEquals([], $result);
    }

    public function testGetAllRecipesUsecaseSuccess()
    {
        
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('findBy')
             ->willReturn($this->getRecipes());
        $result = (new GetAllRecipesUsecase($stub))->execute();
        $this->assertEquals($this->getRecipes(), $result);
    }

    private function getRecipes()
    {
        $recipe = new \stdClass;
        $recipe->id = 1;
        $recipe->name = 'test recipe';
        return [$recipe];
    }
}

