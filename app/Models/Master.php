<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public function disasters()
    {
        return $this->hasMany(Disaster::class);
    }
}
