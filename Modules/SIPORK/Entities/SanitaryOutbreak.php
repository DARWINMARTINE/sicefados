<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SanitaryOutbreak extends Model
{
    use HasFactory;
    protected $table = 'sanitary_outbreaks';
    protected $primaryKey = 'id_outbreak';
    public $timestamps = true;

    protected $fillable = [
        'start_date',
        'end_date',
        'disease',
        'description',
        'lot_id',
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id_lot');
    }
}
