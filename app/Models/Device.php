<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo',
        'mac_address',
        'person_id',
    ];
    public function person(){
        return $this->belongsTo(Person::class);
    }
}
