<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvalidData extends Model
{
    use HasFactory;

    protected $table = 'invalid_data';
    protected $fillable = ['column1', 'column2','column3', 'column4','column5', 'column6','column7', 'column8'];

}
