<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $disaster[] = [
            'value'=>Disaster::count(),
        ];
        $disaster[] = [
            'byType'=>[
                'water'=>Disaster::where('disaster_id','18701')->count(),
                'wind'=>Disaster::where('disaster_id','18702')->count(),
                'fire'=>Disaster::where('disaster_id','18703')->count(),
                'earth'=>Disaster::where('disaster_id','18704')->count(),
            ],
        ];
        $disaster[] = [
            'byLocation'=>[
                'bandar_lampung'=>Disaster::where('kabupaten_id','15542')->count(),
                'lampung_selatan'=>Disaster::where('kabupaten_id','15543')->count(),
                'lampung_barat'=>Disaster::where('kabupaten_id','15544')->count(),
                'lampung_tengah'=>Disaster::where('kabupaten_id','15545')->count(),
                'lampung_timur'=>Disaster::where('kabupaten_id','15546')->count(),
                'lampung_utara'=>Disaster::where('kabupaten_id','15547')->count(),
                'metro'=>Disaster::where('kabupaten_id','15548')->count(),
                'tanggamus'=>Disaster::where('kabupaten_id','15549')->count(),
                'tulang_bawang'=>Disaster::where('kabupaten_id','15550')->count(),
                'way_kanan'=>Disaster::where('kabupaten_id','15551')->count(),
            ]
            ];
        $data[] = [
            'userCount'=>User::where('role','1')->count()
        ];
        $data[] = [
            'disasterCount'=>$disaster,
        ];
        
        // return $data;
        return view('admin.dashboard',compact('data'));
    }
    public function disaster(){
        $disaster = Disaster::all()->sortByDesc('created_at');
        return view('admin.detail', compact('disaster'));
        // return $disaster;
    }
    public function user_detail(){
        $users = User::all();
        return view('admin.user', compact('users'));
    }
}
