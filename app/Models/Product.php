<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model implements TranslatableContract
{
    use HasFactory , Translatable , SoftDeletes , HasEagerLimit;
    public $translatedAttributes = ['title', 'content' , 'tags'];
    protected $fillable = ['id', 'image', 'category_id','price', 'created_at', 'updated_at', 'deleted_at' ,'user_id' ];

    public function category()
    {
       return $this->belongsTo(Category::class , 'category_id');
    }


    public function user()
    {
       return $this->belongsTo(User::class , 'user_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_products');
    }
}