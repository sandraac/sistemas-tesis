<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'name',
        'icon',
        'business_id',
    ];
    public function my_store($request){
        $this->create($request->all());
    }
    public function my_update($request){
        $this->update($request->all());
    }
}
