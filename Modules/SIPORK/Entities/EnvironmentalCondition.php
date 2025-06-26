<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnvironmentalCondition extends Model
{
    protected $table = 'environmental_conditions';
    protected $primaryKey = 'id_condition';
    public $timestamps = true;

    protected $fillable = [
        'date_time',
        'temperature',
        'humidity',
        'ventilation',
        'lot_id',
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id_lot');
    }
}
