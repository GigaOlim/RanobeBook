<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role_id',
        'name',
        'surname',
        'date_birth',
        'phone_number',
        'country_id'
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

    public function roles() {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'id', 'id');
    }

    public function player() {
        return $this->hasOne(Players::class, 'id', 'id');
    }

    public function country() {
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function deal() {
        return $this->hasOne(Deal::class);
    }

    public function isAdmin()
    {
        return $this->role_id === 2;
    }

    public function isModer()
    {
        return $this->role_id === 3;
    }
}
