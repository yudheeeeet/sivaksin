<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['posko_id', 'tanggal_kegiatan', 'petugas', 'deskripsi', 'status'];

    public function posko()
    {
        return $this->belongsTo(Posko::class, 'posko_id', 'id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
