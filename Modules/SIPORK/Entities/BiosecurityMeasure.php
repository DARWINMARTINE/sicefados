<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiosecurityMeasure extends Model
{
    protected $table = 'biosecurity_measures';
    protected $primaryKey = 'id_biosecurity';
    public $timestamps = true;

    protected $fillable = [
        'measure_type',
        'implementation_date',
        'description',
        'cost_id',
        'lot_id',
    ];

    public function cost()
    {
        return $this->belongsTo(OperationalCost::class, 'cost_id', 'id_cost');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id_lot');
    }
}
