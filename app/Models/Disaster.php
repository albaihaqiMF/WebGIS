<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $fillable = ['title','created_at','kabupaten_id','disaster_id'];

    public function masterKabupaten()
    {
        return $this->belongsTo(Master::class, 'kabupaten_id', 'code');
    }
    public function masterDisaster()
    {
        return $this->belongsTo(Master::class, 'disaster_id', 'code');
    }
}
