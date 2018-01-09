<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\DeleteRecipeUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;

class DeleteRecipeUsecaseTest extends TestCase
{
    public function testDeleteRecipeUsecase()
    {
        $stub = $this->createMock(DeleteRecipeUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute(1));
    }

    public function testDeleteRecipeUsecaseCallFails()
    {
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('find')
             ->willReturn([]);
        $result = (new DeleteRecipeUsecase($stub))->execute(1);
        $this->assertEquals([], $result);
    }

    public function testDeleteRecipeUsecaseCallSuccess()
    {
        $recipe = new \stdClass;
        $recipe->id = 1;
        $recipe->name = 'test recipe';
        $stub = $this->createMock(RecipeRepository::class);
        $stub->method('find')
             ->willReturn($recipe);
        $stub->method('remove')
             ->willReturn(true);
        $result = (new DeleteRecipeUsecase($stub))->execute(1);
        $this->assertEquals(true, $result);
    }
}

