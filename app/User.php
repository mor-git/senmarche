<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function profils(){
        return $this->belongsTo('App\Profil','profil_id');
    }
    public function categorieProfils(){
        return $this->belongsTo('App\CategorieProfil','categorieProfil');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profil_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Pour la redirection

    public function isAdmin() {
        return $this->profil_id === 1;
     }
     public function isUser() {
        return $this->profil_id === 2;
     }
}
