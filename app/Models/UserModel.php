<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
        use HasFactory;
        protected $fillable = [
            'model_id',
            'user_id',
            'active',
        ];
        public function user(){
            return $this->belongsto(User::class ,'user_id','id');
        }
        public function models(){
            return $this->belongsto(sModel::class ,'model_id','id');
        }
    }
    