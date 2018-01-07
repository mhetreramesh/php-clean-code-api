<?php declare(strict_types = 1);

namespace RestApi\Transformers;

use League\Fractal\TransformerAbstract;

class RecipeTransformer extends TransformerAbstract
{
	public function transform($recipe)
	{
	    return [
            'id'      => (int) $recipe->id,
            'name'   => $recipe->name,
            'prep_time' => $recipe->prep_time,
            'difficulty' => (int) $recipe->difficulty,
            'vegetarian' => (bool) $recipe->vegetarian,
            'ratings'  => [],
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/recipes/'.$recipe['id'],
                ]
            ]
        ];
	}
}