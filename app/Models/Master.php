<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public function disastersLoc()
    {
        return $this->hasMany(Disaster::class,'kabupaten_id','code');
    }
    public function disastersType()
    {
        return $this->hasMany(Disaster::class,'disaster_id','code');
    }
}
