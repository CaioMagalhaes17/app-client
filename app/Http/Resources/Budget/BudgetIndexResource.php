<?php

namespace App\Http\Resources\Budget;

use App\Business\V1\Client\WebSite\Module\Form\Fields\TypeField\Contracts\HasOptions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BudgetIndexResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request) : Collection
    {
        foreach ($this->resource as $budgets) {
            $data[] = [
                'problemId' => $budgets[0]['fk_id_problem'],
                'budgets' => $this->extractBudgets($budgets),
            ];
        }
        return collect($data);
    }

    private function extractBudgets(Collection $budgets) : Collection
    {
        foreach ($budgets as $budget) {
            $budgetValues = explode("/-/", $budget['value_budget']);
            $budgetsResource[] = [
                'id' => $budget['id_budget'],
                'companyId' => $budget['fk_id_company'],
                'isAccepted' => $budget['accepted_budget'],
                'initialValue' => trim($budgetValues[0]),
                'endValue' => trim($budgetValues[1])
            ];
        }
        return collect($budgetsResource);
    }
}
