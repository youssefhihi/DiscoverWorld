<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture',
    ];

    public function adventure()
    {
        return $this->belongsTo(Adventure::class,'adventureID');
    }
}
