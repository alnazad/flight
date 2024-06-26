<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function Passenger(){
        return $this->hasMany(Passenger::class);
    }
}
