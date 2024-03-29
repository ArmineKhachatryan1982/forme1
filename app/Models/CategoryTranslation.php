<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'language_id',
        'name',
    ];

    public function categories(){
        
        return $this->belongsTo(Category::class,'category_id');
    }
}
