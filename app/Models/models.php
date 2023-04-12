<?php

namespace App\Models;
use App\Models\brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='models';
    protected $primaryKey='id';
    protected $fillable=[
        'brand_id',
        'name',
        'entry_date',
    ]; 
    public function brand()
    {
        return $this->hasOne(brand::class,'id','brand_id');
    }

}
