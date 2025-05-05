<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $guarded = [];


    public function peminjam()
    {
        return $this->hasMany(Peminjam::class, 'alat_id', 'id_alat');
    }
}
