<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairSparePart extends Model
{
    use HasFactory;

    public function spair_parts()
    {
        return $this->hasMany(spair_parts::class);
    }

    public function repair()
    {
        return $this->hasOne(repair::class);
    }
}
