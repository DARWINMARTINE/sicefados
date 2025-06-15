<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diet extends Model
{
    use HasFactory;
    protected $table = 'diets';
    protected $primaryKey = 'id_diet';
    public $timestamps = true;

    protected $fillable = [
        'diet_name',
        'min_age',
        'max_age',
        'min_weight',
        'max_weight',
        'physiological_state',
        'description',
    ];
}
