<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'npwp';
    protected $fillable = [
        'npwp',
        'nama',
        'transaksi',
        'negara',
        'pelabuhan',
        'hscode',
        'jumlah',
        'harga',
        'tarif',
        'ppn',
        'total'
    ];
}
