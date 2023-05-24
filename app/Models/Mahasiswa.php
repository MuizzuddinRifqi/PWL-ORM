<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'nim';

    protected $guarded = [];

    use HasFactory;
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
