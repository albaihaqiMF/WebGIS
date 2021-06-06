<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;
    public function masterKabupaten()
    {
        return $this->belongsTo(Master::class, 'kabupaten_id', 'code');
    }
    public function masterDisaster()
    {
        return $this->belongsTo(Master::class, 'disaster_id', 'code');
    }
}
