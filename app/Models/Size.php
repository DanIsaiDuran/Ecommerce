<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id'];

    //Relacion 1:N inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Relacion N:M 
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }


}
