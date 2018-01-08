<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\CreateRecipeUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;

class CreateRecipeUsecaseTest extends TestCase
{
    public function testCreateRecipeUsecase()
    {
        $stub = $this->createMock(CreateRecipeUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute([]));
    }
}

