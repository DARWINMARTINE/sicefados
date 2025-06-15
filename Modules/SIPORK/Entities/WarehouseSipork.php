<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WarehouseSipork extends Model
{
    use HasFactory;
    protected $table = 'warehouses_sipork';
    protected $primaryKey = 'id_warehouse';
    public $timestamps = true;

    protected $fillable = [
        'warehouse_name',
        'location',
        'capacity',
    ];
}
