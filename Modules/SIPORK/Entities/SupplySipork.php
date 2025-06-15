<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplySipork extends Model
{
    use HasFactory;
    protected $table = 'supplies_sipork';
    protected $primaryKey = 'id_supply';
    public $timestamps = true;

    protected $fillable = [
        'supply_name',
        'supply_type',
        'quantity',
        'unit_cost',
        'entry_date',
        'warehouse_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(WarehouseSipork::class, 'warehouse_id', 'id_warehouse');
    }
}
