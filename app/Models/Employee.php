<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Import HasFactory
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; // 2. Gunakan Trait HasFactory

    /**
     * Nama tabel yang terhubung dengan model ini.
     * (Hanya diisi jika nama tabel Anda BUKAN 'employees')
     *
     * @var string
     */
    // protected $table = 'nama_tabel_anda';

    /**
     * Atribut yang boleh diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
    ];
}
