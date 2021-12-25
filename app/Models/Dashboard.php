<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    protected $table = 'dashboard';

    protected $fillable = [
        'pengumuman'
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

}
