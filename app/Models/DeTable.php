<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeTable extends Model
{
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function machine(){
        return $this->belongsTo(Machine::class);
    }
    public function line(){
        return $this->belongsTo(Line::class);
    }
    public function carType(){
        return $this->belongsTo(CarType::class);
    }
}
