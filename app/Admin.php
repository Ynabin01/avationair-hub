<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $table = 'admins';  // Specify the admins table if needed
    
    

    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isAdmin()
        {
            // Check if the authenticated user's email is in the 'admins' table
            return \DB::table('admins')->where('email', $this->email)->exists();
        }

}
