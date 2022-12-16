<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    
    protected $table = 'tipo';
    
    protected $fillable = ['name'];
    
    public function tipos(){
        return $this->hasMany('App\Models\Post', 'tipoid');
    }
}
