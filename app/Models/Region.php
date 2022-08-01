<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';
    protected $fillable = ['nama_desa', 'jumlah_sasaran', 'geojson'];

    public function posko()
    {
        return $this->hasMany(Posko::class);
    }

}
