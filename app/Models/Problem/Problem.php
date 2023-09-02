<?php

namespace App\Models\Problem;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem', 'fk_id_client_problem']; 
    protected $primaryKey = 'id_problem';
    protected $table = 'problem_registered';
    protected $timeStamps = false;

    public function budget()
    {
        return $this->hasMany(Budget::class, 'fk_id_problem');
    }
}