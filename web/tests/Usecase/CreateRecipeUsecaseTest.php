<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\CreateRecipeUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;
use phpDocumentor\Reflection\Types\Object_;

class CreateRecipeUsecaseTest extends TestCase
{
    public function testCreateRecipeUsecase()
    {
        $stub = $this->createMock(CreateRecipeUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute([]));
    }

    public function testCreateRecipeUsecaseCall()
    {
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('save')
             ->willReturn(1);
        $stub->method('find')
             ->willReturn([]);
        $result = (new CreateRecipeUsecase($stub))->execute([]);     
        $this->assertEquals([], $result);
    }

    public function testCreateRecipeUsecaseReturnsResult()
    {
        $recipe = new \stdClass;
        $recipe->name = 'test recipe';
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('save')
             ->willReturn(1);
        $stub->method('find')
             ->willReturn($recipe);
        $result = (new CreateRecipeUsecase($stub))->execute([]);
        $this->assertEquals($recipe, $result);
    }
}

