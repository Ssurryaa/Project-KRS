<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class MataKuliah extends Model
{
    use HasFactory;
    public $table = "matakuliahs";

    protected $fillable = [
        'kode',
        'nama_matakuliah',
        'semester',
        'sks',
        'prodi_id',
        'dosen_id',
        'status_mk'
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function prodis()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
    
    public function dosens()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function mahasiswas()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public static function getEnumKey($name)
    {
        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select(DB::raw('SHOW COLUMNS FROM ' . $instance->getTable() . ' WHERE Field = "' . $name . '"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum[] = $v;
        }
        return $enum;
    }
}
