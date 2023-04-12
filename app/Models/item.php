<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
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
