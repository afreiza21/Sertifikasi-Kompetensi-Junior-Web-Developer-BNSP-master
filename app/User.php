<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    public function get_avatar_url()
    {
        if ($this->avatar == '' || $this->avatar == NULL) {
            return asset('img/default.png');
        } else {
            return url(Storage::url($this->avatar));
        }
    }

    public function is_registered()
    {
        $is_registered = Registration::where('user_id', $this->id)->first();
        if ($is_registered) {
            return '<span class="badge badge-success">Sudah</span> ' . $is_registered->status_label;
        } else {
            return '<span class="badge badge-warning">Belum</span>';
        }
    }

    public function getRoleNameAttribute()
    {
        return $this->role == 'admin' ? 'Administrator' : 'Siswa';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar', 'role'
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

    protected $append = [
        'role_name'
    ];
}
