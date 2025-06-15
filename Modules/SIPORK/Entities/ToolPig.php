<?php

namespace Modules\SIPORK\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToolPig extends Model
{
    protected $table = 'tools_pigs';
    protected $primaryKey = 'id_tool_pig';
    public $timestamps = true;

    protected $fillable = [
        'tool_id',
        'pig_id',
        'usage_date',
        'task_description',
    ];

    public function tool()
    {
        return $this->belongsTo(ToolSipork::class, 'tool_id', 'id_tool');
    }

    public function pig()
    {
        return $this->belongsTo(Pig::class, 'pig_id', 'id_pig');
    }
}
