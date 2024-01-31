<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'country',
    ];

    public function adventures()
    {
        return $this->hasMany(Adventure::class);
       
    }

}
