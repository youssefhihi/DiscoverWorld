<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'advice',
    ];

    public function country()
    {
        return $this->belongsTo(country::class);
    }
    public function pictures()
    {
        return $this->hasMany(Pictures::class);
    }
}
