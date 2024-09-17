<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KedatanganTamu extends Model
{
    use HasFactory;
    protected $table = 'kedatangan_tamu';
    protected $primaryKey = 'id_kedatangan_tamu'; // Set primary key
    public $incrementing = false; // Non-incrementing
    protected $keyType = 'string'; // String type
    protected $fillable = [
        'id_kedatangan_tamu',
        'id_pegawai',
        'id_tamu',
        'id_user',
        'QR_code',
        'Tujuan',
        'Instansi',
        'Waktu_perjanjian',
        'Foto',
        'Waktu_kedatangan',
        'Status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ambil record terakhir
            $lastRecord = self::orderBy('id_kedatangan_tamu', 'desc')->first();
            // Ambil angka dari id terakhir dan tambahkan 1
            $lastIdNumber = $lastRecord ? (int)substr($lastRecord->id_kedatangan_tamu, 4) : 0;
            // Generate id baru
            $model->id_kedatangan_tamu = 'KDT_' . str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    public function tamu(): BelongsTo
    {
        return $this->belongsTo(Tamu::class, 'id_tamu');
    }

    /**
     * Get the Pegawai associated with the model.
     */
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    /**
     * Get the User associated with the model.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

