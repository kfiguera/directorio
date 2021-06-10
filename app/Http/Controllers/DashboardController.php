<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $directories = Directory::all()->load('title','office','state');
        return view('dash.index', compact('directories'));
    }
}
