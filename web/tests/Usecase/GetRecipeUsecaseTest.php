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
        $stub->method('execute', 1)
             ->with($this->equalTo(1))
             ->willReturn([]);
        $this->assertEquals([], $stub->execute());

    }
}

