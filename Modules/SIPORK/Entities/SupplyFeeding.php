<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplyFeeding extends Model
{
    use HasFactory;
    protected $table = 'supplies_feeding';
    protected $primaryKey = 'id_supply_feeding';
    public $timestamps = true;

    protected $fillable = [
        'feeding_id',
        'supply_id',
        'quantity_used',
        'usage_date',
    ];

    public function feeding()
    {
        return $this->belongsTo(Feeding::class, 'feeding_id', 'id_feeding');
    }

    public function supply()
    {
        return $this->belongsTo(SupplySipork::class, 'supply_id', 'id_supply');
    }
}
