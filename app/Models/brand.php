<?php

namespace App\Models;
use App\Models\models;

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

    public function models()
    {
        return $this->belongsTo(models::class);
    }
}
