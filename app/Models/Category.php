<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'parent_id'
    ];

    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }
    public function category_translations(){
        return $this->hasMany(CategoryTranslation::class);

    }
    public function translation($lng_id){
        return $this->hasOne(CategoryTranslation::class)->where('language_id', $lng_id)->first();
    }


}
