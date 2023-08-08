<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role_id',
        'age',
        'dni',
        'birthdate',
        'phone_number',
        'employee_number',
        'gender',
        'category',
        'image'
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
        'password' => 'hashed',
    ];
     public function role() {
        return $this->belongsTo(Role::class);
    }

    public function asset()
        {
            return $this->belongsToMany(Asset::class, 'bookings', 'asset_id', 'user_id')
                        ->withPivot('status', 'start_date', 'end_date');
        }

        public function teams()
        {
            return $this->belongsToMany(Team::class, 'teams_users', 'user_id', 'team_id');
        }
    }
