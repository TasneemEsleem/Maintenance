<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    public function getActiveStatusAttribute()
    {
       return $this->active ? 'Active' : 'InActive';
    }
    public function categories(){
        return $this ->hasmany(Category::class ,'admin_id','id');
    }
    public function brands(){
        return $this ->hasmany(Brand::class ,'admin_id','id');
    }

    public function models(){
        return $this ->hasmany(SModel::class ,'admin_id','id');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


  
}
