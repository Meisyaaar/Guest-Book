<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIP'; // Menentukan kolom primary key
    public $incrementing = false; // Non-incrementing karena kita menggunakan string sebagai ID
    protected $keyType = 'string';

    protected $table = 'pegawais';

    // Mass assignable attributes
    protected $fillable = [
        'id_user',
        'NIP',
        'No_telp',
        'PTK'
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'id_user');

    }

    public function kedatanganTamu()
    {
        return $this->hasMany(KedatanganTamu::class, 'id_pegawai', 'NIP');
    }

}
