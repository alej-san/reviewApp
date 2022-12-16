<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts(){
        return $this->hasMany('App\Models\Post', 'userid');
    }
    
    function updateUser($sendEmail = false) {
        try {
            $this->update();
            if($sendEmail){
            $this->sendEmailVerificationNotification();
        }
            return true;
        } catch(\Exception $e){
            return false;
        }
    }
    
    function deleteUser($user){
        
         if($user->email != $this->email){
            try{
                $this->delete();
                return true;
            }catch(\Exception $e){
                
            }
        }
        return false;
    }
    
    function storeUser(){
        try{
            $this->save();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    
    function isAdmin(){
        return $this->type == 'Admin';
    }
    function isAdvanced(){
        return $this->type == 'Advanced' || $this->type == 'Admin';
    }
    function isUser(){
        return $this->type == 'User' || $this->type == 'Advanced' || $this->type == 'Admin';
    }
    
}
