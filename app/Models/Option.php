<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'wp_options';
    protected $primaryKey = 'option_id';

}