<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cache;
use Carbon\Carbon;

class profileController extends Controller
{
    public function status()
    {
        $users = User::all();
        return view('status', compact('users'));
    }
}
