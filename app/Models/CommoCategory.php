<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommoCategory extends Model
{
    use HasFactory;

    protected $table = 'c4s_commo_category';

    protected $fillable = [
        'category_group_id',
        'category_id',
        'commo_code',
        'commo_category',
        'commo_desc',
    ];

    public function categorygroups()
    {
        return $this->belongsTo(CategoryGroup::class,'category_group_id','id');
    }

    public function communicationcategories()
    {
        return $this->belongsTo(CommunicationCategory::class,'category_id','id');
    }
}
