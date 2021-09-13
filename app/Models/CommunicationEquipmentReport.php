<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationEquipmentReport extends Model
{
    use HasFactory;

    protected $table = 'c4s_equipment';

    public function nomenclatures()
    {
        return $this->belongsTo(CommunicationNomenclature::class,'nomenclature_id','id');
    }
}
