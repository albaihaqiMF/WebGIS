<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function showByLocation()
    {
        $value = Disaster::all()->where('kabupaten_id', '=', request()->id);
        return $value->count();
    }
    public function showByType()
    {
        $value = request()->type == null ? Disaster::all()->where('kabupaten_id', '=', request()->id) :
            Disaster::all()->where('kabupaten_id', '=', request()->id)->where('disaster_id', request()->type);
        return $value->count();
    }
    public function showByLocationLength(Master $master)
    {
        $value = $master->disastersLoc;


        return $value->count();
    }

    public function showByTypeLength(Master $master)
    {
        $value = $master->disastersType;

        return $value->count;
    }
}
