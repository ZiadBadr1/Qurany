<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouraCard extends Model
{
    use HasFactory;
    protected $fillable = ['title','id'];
    public function soura()
    {
        return $this->hasMany(Soura::class);
    }
}
