<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'identificacion',
        'telefono',
        'correo'
    ];

    public function devices(){
        return $this->hasMany(Device::class);
    }
}
