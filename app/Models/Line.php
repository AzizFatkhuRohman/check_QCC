<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasUuids;
    protected $guarded =[];
    public function deTable(){
        return $this->hasMany(DeTable::class);
    }
    public function index(){
        return $this->latest();
    }
    public function Show($id){
        return $this->find($id);
    }
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id,$data){
        return $this->find($id)->update($data);
    }
    public function Trash($id){
        return $this->find($id)->delete();
    }
}
