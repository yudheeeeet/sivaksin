<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posko extends Model
{
    use HasFactory;

    protected $table = 'posko';
    protected $fillable = ['region_id', 'nama_posko', 'alamat', 'latitude', 'longitude'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
