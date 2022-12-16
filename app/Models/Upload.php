<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    
    protected $table = 'upload';
    
    public function posts(){
        return $this->belongsTo('App\Models\Post', 'uploadid');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'userid');
    }
}
