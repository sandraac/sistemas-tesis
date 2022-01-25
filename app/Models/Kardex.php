<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;
    protected $table ="kardex";
    protected $primaryKey = "id";
    public $timestamps= false;
    protected $fillable = [
        'producto_id','input_units', 'input_cost','output_units','output_cost'
    ];

    public function categoria() {
        return $this->hasAny('App\Product','id','product_id');
    }
}
