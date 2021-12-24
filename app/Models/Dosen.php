<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'telepon',
        'prodi_id',
        'foto_dosen'
    ];
    
    protected $hidden = [
        'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password_mahasiswa;
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function prodis()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function matakuliahs()
    {
        return $this->belongsTo(MataKuliah::class, 'dosen_id');
    }

}
