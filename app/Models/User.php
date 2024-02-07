<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  protected $guarded = ['id'];

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


    public function detail(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function alamat(): HasOne
    {
        return $this->hasOne(UserAlamat::class, 'user_id');
    }

    public function asal_sekolah(): HasOne
    {
        return $this->hasOne(UserAsalSekolah::class, 'user_id');
    }

    public function ayah(): HasOne
    {
        return $this->hasOne(UserDataAyah::class, 'user_id');
    }

    public function ibu(): HasOne
    {
        return $this->hasOne(UserDataIbu::class, 'user_id');
    }

    public function wali(): HasOne
    {
        return $this->hasOne(UserDataWali::class, 'user_id');
    }

    public function kerja(): HasOne
    {
        return $this->hasOne(UserStatusKerja::class, 'user_id');
    }

    public function lampiran(): HasOne
    {
        return $this->hasOne(UserLampiran::class, 'user_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(UserActivity::class);
    }
}
