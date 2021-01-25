<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function store(Request $request, User $band)
    {

    }
}
