<?php

namespace App\Http\Resources\Problem;

use App\Business\V1\Client\WebSite\Module\Form\Fields\TypeField\Contracts\HasOptions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ProblemIndexResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request) : Collection
    {
        foreach ($this->resource as $problem) {
            $data[] = [
                'id' => $problem->id_problem,
                'model' => $problem->model_problem,
                'description' => $problem->desc_problem,
                'brand' => $problem->brand_problem,
                'updated_at' => $problem->updated_at,
                'created_at' => $problem->created_at,
                'isFinishied' => $problem->finished_problem
            ];
        }
        return collect($data);
    }
}
