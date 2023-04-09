<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'entry_date',
    ];

}
