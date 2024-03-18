<?php

namespace App\Http\Controllers;

use App\Models\chef;
use App\Models\home;
use App\Models\menu;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $menus = menu::latest()->paginate(8);
        $teams = chef::latest()->paginate(4);
        $teamsCount = chef::count();
        return view('index', compact('users', 'menus', 'teams', 'teamsCount'));
    }

}