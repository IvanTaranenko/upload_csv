<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidData extends Model
{
    use HasFactory;


    protected $table = 'valid_data';
    protected $fillable = ['column1', 'column2','column3', 'column4','column5', 'column6','column7', 'column8'];


    public static $rules = [
        'column1' => 'required|alpha',
        'column2' => 'required|alpha',
        'column3' => 'required|alpha',
        'column4' => 'required|alpha',
        'column5' => 'required|alpha',
        'column6' => 'required|alpha',
        'column7' => 'required|alpha',
        'column8' => 'required|alpha',
    ];
}
