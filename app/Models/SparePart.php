<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;


    public function getActiveStatusAttribute()
    {

       return $this->active ? 'Active' : 'InActive';
    }
    public function getNameAttribute()
    {

       return $this->spareparttranslation->first()->name??'';
    }


    public function getOverViewAttribute()
    {

       return $this->spareparttranslation->first()->over_view??'';
    }
    public function spareparttranslation(){
        return $this ->hasmany(SparePartTranslation::class ,'spare_part_id','id');
    }

    public function smodels()
    {

        return $this->belongsToMany(SModel::class, SparePartModel::class,'spare_part_id','s_model_id');
    }


    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->images()->first()->url);
    }
    public function getMainImageAttribute()
    {
        return $this->images()->first()->url;
    }

}
