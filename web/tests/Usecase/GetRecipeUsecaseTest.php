<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\GetRecipeUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;

class GetRecipeUsecaseTest extends TestCase
{
    public function testGetRecipeUsecase()
    {
        $stub = $this->createMock(GetRecipeUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute(1));
    }

    public function testGetRecipeUsecaseFails()
    {
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('find')
             ->willReturn($this->getRecipe());
        $result = (new GetRecipeUsecase($stub))->execute(3);
        $this->assertNotEquals($this->getRecipe(), $result);
    }

    public function testGetRecipeUsecaseSuccess()
    {
        
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('find')
             ->willReturn($this->getRecipe());
        $result = (new GetRecipeUsecase($stub))->execute(1);
        $this->assertEquals($this->getRecipe(), $result);
    }

    private function getRecipe()
    {
        $recipe = new \stdClass;
        $recipe->id = 1;
        $recipe->name = 'test recipe';
        return $recipe;
    }
}

