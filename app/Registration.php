<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        switch($this->status) {
            case 'pending':
                return '<span class="badge badge-warning">Pending</span>';
                break;
            case 'diterima':
                return '<span class="badge badge-success">Diterima</span>';
                break;
            case 'cadangan':
                return '<span class="badge badge-info">Cadangan</span>';
                break;
            case 'tidak_diterima':
                return '<span class="badge badge-danger">Tidak Diterima</span>';
                break;
        }
    }

    public function gender_name()
    {
        return $this->gender == 'L' ? 'Laki-Laki' : 'Perempuan';
    }

    protected $append = [
        'status_label'
    ];
}
