<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minta extends Model
{
    use HasFactory;
    protected $table = 'dbMinta';
    protected $fillable = [
        'idBarang',
        'namaBarang',
        'pemilik',
        'pencari',
        'idBarang',
        'namaPemilik',
        'jumlah',
        'waktu',
        'kirim',
        'resi',
        'status'
    ];
}
