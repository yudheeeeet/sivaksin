<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccine';
    protected $fillable = ['kategori', 'jenis_vaksin', 'stock'];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
