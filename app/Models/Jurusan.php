<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $guarded = [];


    
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'jurusan_id', 'id_jurusan');
    }
}
