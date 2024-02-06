<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Content;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        if (User::role('admin')->find(Auth::user()->id)) {

            $today_date = date('Y-m-d 00:00:00');
            $tomorrow_date = date('Y-m-d 00:00:00', strtotime("+1 days"));

            // $data['today_orders'] = Order::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->count();
            $today_customers = User::role('user')->where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->count();
            // $data['today_jobs'] = Job::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->count();
            // $data['today_sales'] = Order::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->sum('grand_total');

            $users = User::count();
            $contents = Content::count();
            $roles = Role::count();
            return view('admin.dashboard.index', compact('users','contents','roles', 'today_customers'));
        }
    }
}
