<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'telepon',
        'prodi_id',
        'angkatan',
        'foto_mahasiswa',
        'password_mahasiswa'
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

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
