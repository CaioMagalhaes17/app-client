<?php

namespace App\Http\Resources\Budget;

use App\Business\V1\Client\WebSite\Module\Form\Fields\TypeField\Contracts\HasOptions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use App\Models\Problem\Budget as BudgetModel;

class BudgetAcceptedResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request): Collection
    {
        foreach ($this->resource as $budget) {
            $data[] = [
                'problemId' => $budget['fk_id_problem'],
                'budgets' => $this->extractBudgets($budget),
            ];
        }
        return collect($data);
    }

    private function extractBudgets(BudgetModel $budget)
    {   
        $budgetValues = explode("/-/", $budget['value_budget']);
        return collect(
            [
                'id' => $budget['id_budget'],
                'companyId' => $budget['fk_id_company'],
                'isAccepted' => $budget['accepted_budget'],
                'initialValue' => trim($budgetValues[0]),
                'endValue' => trim($budgetValues[1])
            ]
        );
    }
}
