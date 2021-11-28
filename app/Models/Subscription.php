<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
    ];
    public function getAvatarAttribute(){
        $email = md5($this->email);
        return "https://s.gravatar.com/avatar/$email";
    }
    public function validation_status(){
        return 'falta';
    }
}
