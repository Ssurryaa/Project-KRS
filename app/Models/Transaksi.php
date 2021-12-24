<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'mahasiswa_id',
        'matakuliah_id',
        'nilai',
        'status'
    ];
    protected $table = 'trx_krss';
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id', 'id');
    }
    public function matkul(){
        return $this->belongsTo(MataKuliah::class,'matakuliah_id','id');
    }
    use HasFactory;
}
