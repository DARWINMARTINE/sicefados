<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feeding extends Model
{
    use HasFactory;
    protected $table = 'feeding';
    protected $primaryKey = 'id_feeding';
    public $timestamps = true;

    protected $fillable = [
        'pig_id',
        'lot_id',
        'diet_id',
        'feeding_date',
        'food_amount',
        'fcr',
        'cost_id',
    ];

    public function pig()
    {
        return $this->belongsTo(Pig::class, 'pig_id', 'id_pig');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id_lot');
    }

    public function diet()
    {
        return $this->belongsTo(Diet::class, 'diet_id', 'id_diet');
    }

    public function cost()
    {
        return $this->belongsTo(OperationalCost::class, 'cost_id', 'id_cost');
    }
}
