<?php declare(strict_types = 1);

namespace Tests\Usecase;

use Core\Adapter\RecipeRepositoryInterface;
use Core\Usecase\UpdateRecipeUsecase;
use PHPUnit\Framework\TestCase;
use Core\Repository\RecipeRepository;

class UpdateRecipeUsecaseTest extends TestCase
{
    public function testUpdateRecipeUsecase()
    {
        $stub = $this->createMock(UpdateRecipeUsecase::class);
        $stub->method('execute')
             ->willReturn([]);
        $this->assertEquals([], $stub->execute(1, []));
    }
}

