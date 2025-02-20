<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rating extends Model
{
    protected $table = 'ratings';
    use HasFactory;


    public function property(){
        return $this->belongsTo(Property::class);
    }

}
