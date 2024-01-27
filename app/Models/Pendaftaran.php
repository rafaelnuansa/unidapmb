<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function jurusan1()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_1_id');
    }

    public function jurusan2()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_2_id');
    }

    public function jurusan3()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_3_id');
    }
}
