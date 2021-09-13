<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    use HasFactory;

    public $table = 'c4s_category_group';

    protected $fillable = [
        'category_group_code',
        'category_group_desc',
    ];
}
