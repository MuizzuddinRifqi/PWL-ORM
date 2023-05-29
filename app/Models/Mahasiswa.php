<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'Nim';

    protected $guarded = [];

    use HasFactory;
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        //return $this->belongsToMany(MataKuliah::class)->withPivot('nilai');
        //return $this->belongsToMany(Role::class, 'mahasiswa_matakuliah');
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
        
    }

    public function getRouteKeyName()
    {
        return 'Nim';
    }
}
