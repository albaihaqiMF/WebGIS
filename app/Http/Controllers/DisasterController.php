<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use Illuminate\Http\Request;

class DisasterController extends Controller
{
    public function index(){
        $disaster = Disaster::orderBy('created_at','desc')->paginate(10);

        return view('admin.detail', compact('disaster'));
    }

    public function store(Request $request){
        $disaster = $this->validate($request, [
            'title'=>'required',
            'created_at'=>'required',
            'kabupaten_id'=>'required',
            'disaster_id'=>'required',
        ]);

        Disaster::create($disaster);

        return back();
    }
}
