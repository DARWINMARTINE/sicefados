<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id_report';
    public $timestamps = true;

    protected $fillable = [
        'report_type',
        'report_date',
        'description',
        'lot_id',
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id_lot');
    }
}
