<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $guarded = ['id'];
   protected $fillable = ['name', 'email', 'password','role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ledGroup()
    {
        return $this->hasOne(Group::class, 'leader_id');
    }
    public function groupMemberships()
    {
        return $this->belongsToMany(Group::class);
    }
}
