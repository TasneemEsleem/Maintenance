<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    public function problem()
    {
        return $this->hasOne(Problem::class,'id','problem_id');

    }

    public function spareparts()
    {
        return $this->belongsToMany(SparePart::class, RepairSparePart::class,'repairs_id','spare_parts_id');
    }

}
