<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Property extends Model
{
    use HasFactory; //Esta línea indica que vamos a hacer uso de factories

    public function listType(): BelongsTo{
        return $this->belongsTo(PropertyListingType::class, 'property_listing_type'); //esta instruccion indica que la propiedad pertenece a un tipo de listado
    }

    public function city(): BelongsTo{
        return $this->belongsTo(City::class);
    }

    public function getPriceAsCurrency(){
        return Number::currency($this->price);
    }
    public function getPriceBySquareFeet(){
        return Number::currency($this->price/$this->sq_ft);
    }
///////////
    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function averageRating() {
        return $this->ratings()->avg('rating');
    }

}

