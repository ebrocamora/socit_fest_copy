<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomRewardsController extends Controller
{
    public function index()
    {
        return view('admin.rewards.custom.index');
    }
}
