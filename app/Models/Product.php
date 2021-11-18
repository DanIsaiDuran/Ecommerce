<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion 1:N 
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //Relacion 1:N  inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //Relacion N:M 
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    //Relacion 1:N polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }

     //Url amigables
     public function getRouteKeyName()
     {
         return 'slug';
     }
    
}
