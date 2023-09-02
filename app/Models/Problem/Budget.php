<?php

namespace App\Models\Problem;

use App\Models\Problem\Problem;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['fk_id_problem', 'fk_id_company', 'value_budget', 'accepted_budget']; 
    protected $primaryKey = 'id_budget';
    protected $table = 'budget_returned';
    protected $timeStamps = false;

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'id_problem');
    }
}