<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{
    use HasFactory;
    protected $table ="tiempos";
    protected $primaryKey = "id";
    public $timestamps= false;
    protected $fillable = [
        'fechainicio','fechafin', 'intervalo',
    ];
}