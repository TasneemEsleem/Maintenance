<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairProblem extends Model
{
    use HasFactory;
    // public function repair()
    // {
    //     return $this->hasOne(Repair::class);
    // }


    public function problem_statuses()
    {
        return $this->belongsTo(ProblemStatus::class);
    }



    public function problem()
    {
        return $this->hasOne(Problem::class,'id','problem_id');

    }

    public function spareparttranslation(){
        return $this ->hasmany(SparePartTranslation::class );
    }


    public function spair_parts()
    {
        return $this->hasMany(spair_parts::class);
    }

    public function repair()
    {
        return $this->hasOne(repair::class);
    }

}
