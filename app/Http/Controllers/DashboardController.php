<?php

namespace App\Http\Controllers;

use App\Models\chef;
use App\Models\menu;
use App\Models\User;
use App\Models\tables;
use App\Models\booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $usersCount = User::count();
        $menusCount = menu::count();
        $bookingsCount = booking::count();
        $chefsCount = chef::count();
        $tablesCount = tables::count();
        $bookingsCount = booking::count();
        $users = User::all();
        $menus = menu::all();
        $chefs = chef::all();
        $tables = tables::all();
        $bookings = booking::all();
        return view('admin.dashboard.index', compact('usersCount', 'menusCount', 'bookingsCount', 'chefsCount', 'tablesCount', 'bookingsCount', 'users', 'menus', 'chefs', 'tables', 'bookings'));
    }
}