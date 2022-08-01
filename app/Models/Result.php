<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';
    protected $fillable = ['event_id', 'vaccine_id', 'stock_used', 'stock_available'];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
}
