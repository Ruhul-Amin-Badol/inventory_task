<?php

namespace App\Models;
use App\Models\models;
use App\Models\brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table='items';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'brand_id',
        'model_id',
        'entry_date',
    ]; 
    use HasFactory;
    public function branditem()
    {
        return $this->hasOne(brand::class,'id','brand_id');
    }
    public function brandmodel()
    {
        return $this->hasOne(models::class,'id','model_id');
    }
}
