<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adSettings extends Model
{
    use HasFactory;


    protected $table = 'ad_settings';

    public $timestamps = false;

    //SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list'

    

}
