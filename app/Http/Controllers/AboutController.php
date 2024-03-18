<?php

namespace App\Http\Controllers;

use App\Models\chef;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamsCount = chef::count();
        return view('about', compact('teamsCount'));
    }

}