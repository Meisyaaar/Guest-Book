<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KedatanganEkspedisi extends Model
{
    use HasFactory;

    protected $table = 'kedatangan_ekspedisi';
    protected $primaryKey = 'id_kedatangan_ekspedisi'; // Set primary key
    public $incrementing = false; // Non-incrementing
    protected $keyType = 'string'; // String type

    protected $fillable = [ 
        'id_ekspedisi',
        'id_pegawai',
        'id_user',
        'Foto',
        'Tanggal_waktu',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ambil record terakhir
            $lastRecord = self::orderBy('id_kedatangan_ekspedisi', 'desc')->first();
            // Ambil angka dari id terakhir dan tambahkan 1
            $lastIdNumber = $lastRecord ? (int)substr($lastRecord->id_kedatangan_ekspedisi, 4) : 0;
            // Generate id baru
            $model->id_kedatangan_ekspedisi = 'KDE_' . str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    public function ekspedisi(): BelongsTo
    {
        return $this->belongsTo(Ekspedisi::class, 'id_ekspedisi');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
