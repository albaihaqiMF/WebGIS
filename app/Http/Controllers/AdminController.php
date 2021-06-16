<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function user_detail()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
}
