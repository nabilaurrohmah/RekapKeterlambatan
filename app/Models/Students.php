<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 
        'name', 
        'rombel_id', 
        'rayon_id'
    ];

    public function rombel(){
        return $this->belongsTo(Rombels::class);
    }

    public function rayon(){
        return $this->belongsTo(Rayons::class);
    }

    public function late(){
        return $this->hasMany(Late::class);
    }
}
