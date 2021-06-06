<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function showByLocation(Master $master)
    {
        $value = $master->disastersLoc;


        return $value;
    }
    public function showByType(Master $master)
    {
        $value = $master->disastersType;

        return $value;
    }
}
