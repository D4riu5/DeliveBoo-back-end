<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'PIVA',
        'prezzo_spedizione',
        'image',
        // 'avg_rating',
        // 'total_reviews',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function foods(){
        return $this->hasMany(Food::class);
    }

}
