<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
   
    protected $table = "country";

    protected $fillable = [
        'country',
    ];

    public function adventures()
    {
        return $this->hasMany(Adventure::class);
       
    }
    public function pictures()
    {
        return $this->hasOne(Pictures::class,'id');
    }

}
