<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationEquipment extends Model
{
    use HasFactory;

    protected $table = 'c4s_equipment';

    protected $fillable = [
        'nomenclature_id',
        'serial_number',
        'unitcode',
        'pamu',
        'status',
        'specification',
        'remarks',
        'date_acquired',
        'cost_acquired',
    ];

    public function nomenclatures()
    {
        return $this->belongsTo(CommunicationNomenclature::class,'nomenclature_id','id');
    }
}
