<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationCategory extends Model
{
    use HasFactory;

    protected $table = 'c4s_category';

    protected $fillable = [
        'category_group_id',
        'category_code',
        'category_description',
    ];

    public function categorygroups()
    {
        return $this->belongsTo(CategoryGroup::class,'category_group_id','id');
    }
}
