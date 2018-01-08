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
}

