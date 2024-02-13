<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jurusans()
    {
        return $this->hasMany(Jurusan::class );
    }
}
