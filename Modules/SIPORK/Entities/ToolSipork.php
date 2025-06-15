<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToolSipork extends Model
{
    protected $table = 'tools_sipork';
    protected $primaryKey = 'id_tool';
    public $timestamps = true;

    protected $fillable = [
        'tool_name',
        'quantity',
        'purchase_date',
        'unit_cost',
        'warehouse_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(WarehouseSipork::class, 'warehouse_id', 'id_warehouse');
    }
}
