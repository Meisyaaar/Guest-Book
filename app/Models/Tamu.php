<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tamu'; // Set primary key
    public $incrementing = false; // Non-incrementing
    protected $keyType = 'string'; // String type
    protected $table = 'tamu';

    protected $fillable = [
        'id_tamu',
        'Nama',
        'Alamat',
        'No_telp',
        'Email',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate id_ekspedisi before saving
        static::creating(function ($model) {
            // Ambil record terakhir
            $lastRecord = self::orderBy('id_tamu', 'desc')->first();
            // Ambil angka dari id terakhir dan tambahkan 1
            $lastIdNumber = $lastRecord ? (int)substr($lastRecord->id_tamu, 4) : 0;
            // Generate id baru
            $model->id_tamu = 'TM_' . str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    public function kedatanganTamu()
    {
        return $this->hasMany(KedatanganTamu::class, 'id_tamu', 'id_tamu');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'NIP');
    }
}
