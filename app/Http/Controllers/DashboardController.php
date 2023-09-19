<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DailySale;

class DashboardController extends Controller
{
    public function index(){
        $agents = User::where('account_type', 'Agent')->get();
        $sub_agents = User::where('account_type', 'Sub-agent')->get();
        $staffs = User::where('account_type', 'Staff')->get();

        // Date Array
        $twoWeeksAgo = now()->subWeeks(2);
        $today = now();

        $dates = [];
        $chartWeeksSalesData = [];

        while ($twoWeeksAgo->lte($today)) {

            $twoWeeksAgoDate = $twoWeeksAgo->toDateString();
            $dailySales = DailySale::where('date', $twoWeeksAgoDate)->sum('amount');
            $chartWeeksSalesData[] =  $dailySales;
            $dates[] = $twoWeeksAgoDate;
            $twoWeeksAgo->addDay();
        }

        $maxWeekSales = max($chartWeeksSalesData);

        return view('dashboard', compact('agents', 'sub_agents', 'staffs', 'chartWeeksSalesData', 'maxWeekSales', 'dates'));
        
    }
}