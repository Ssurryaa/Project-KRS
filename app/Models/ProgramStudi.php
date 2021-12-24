<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    public $table = "prodis";
    protected $fillable = [
        'nama_prodi'
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function mahasiswas()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    
}
