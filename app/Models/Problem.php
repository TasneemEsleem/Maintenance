<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    // public function models()
    // {
    //     return $this->hasOne(SModel::class,'id','model_id');
    // }

    public function models(){
        return $this->hasMany(ProblemModel::class);
     }

   public function user()
   {
       return $this->hasOne(User::class,'id','user_id');
   }

   public function repair()
   {
       return $this->hasOne(repair::class);
   }
}
