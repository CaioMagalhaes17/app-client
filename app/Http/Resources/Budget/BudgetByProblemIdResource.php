<?php

namespace App\Http\Resources\Budget;

use App\Business\V1\Client\WebSite\Module\Form\Fields\TypeField\Contracts\HasOptions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BudgetByProblemIdResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request) : Collection
    {
        return $this->resource->map(function ($item) {
            $budgetValues = explode("/-/", $item['value_budget']);
            return [
                'id' => $item['id_budget'],
                'isAccepted' => $item['accepted_budget'],
                'initialValue' => trim($budgetValues[0]),
                'endValue' => trim($budgetValues[1])
            ];
        });
    }
}
