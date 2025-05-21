<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lot extends Model
{
    use HasFactory;
    protected $table = 'lots';
    protected $primaryKey = 'id_lot';
    public $timestamps = true;

    protected $fillable = [
        'lot_name',
        'creation_date',
        'status',
    ];
    
    // Relación opcional (por si usas pigs_lots más adelante)
    public function pigs()
    {
        return $this->belongsToMany(Pig::class, 'pigs_lots', 'lot_id', 'pig_id')
                    ->withPivot('entry_date', 'exit_date')
                    ->withTimestamps();
    }
}
