<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'post';
    
    protected $fillable = ['title', 'message', 'userid, uploadid'];
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'userid');
    }
    
    public function uploaded(){
        return $this->hasMany('App\Models\Upload', 'postid');
    }
    public function tipos(){
        return $this->belongsTo('App\Models\Tipo', 'tipoid');
    }
    
}
