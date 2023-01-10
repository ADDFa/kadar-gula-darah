<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SugarLevels extends Model
{
    use HasFactory;

    protected $table = 'sugar_levels';

    protected $guarded = ['id'];

    public $timestamps = false;
}
