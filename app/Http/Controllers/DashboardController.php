<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $agents = User::where('account_type', 'Agent')->get();
        $sub_agents = User::where('account_type', 'Sub-agent')->get();
        $staffs = User::where('account_type', 'Staff')->get();
        return view('dashboard', compact('agents', 'sub_agents', 'staffs'));
    }
}