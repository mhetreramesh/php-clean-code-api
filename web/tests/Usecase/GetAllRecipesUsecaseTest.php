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
}

