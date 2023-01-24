<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getActiveStatusAttribute()
    {
        
       return $this->active ? 'Active' : 'InActive';
    }
    public function admin(){
        return $this->belongsto(Admin::class ,'admin_id','id');
    }
}
