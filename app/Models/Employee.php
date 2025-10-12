<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Import HasFactory
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'department_id',
        'jabatan_id'
    ];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Position.
     * Satu pegawai hanya memiliki satu jabatan.
     */
    public function position(): BelongsTo
    {
        // Karena nama kolom foreign key (jabatan_id) berbeda dengan
        // standar Laravel (position_id), kita perlu menentukannya secara manual.
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}
