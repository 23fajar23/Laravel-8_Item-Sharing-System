<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;
    protected $table = 'dbPesan';
    protected $fillable = [
        'pesan',
        'user1',
        'user2',
        'tanggal',
        'waktu',
        'key'
    ];
}
