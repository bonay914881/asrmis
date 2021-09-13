<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationNomenclature extends Model
{
    use HasFactory;

    protected $table = 'c4s_nomenclature';

    protected $fillable = [
        'commo_category_id',
        'equipment_code',
        'nomenclature',
        'classification',
    ];

    public function commocategories()
    {
        return $this->belongsTo(CommoCategory::class,'commo_category_id','id');
    }
}
