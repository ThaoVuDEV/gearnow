<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard');
    }
     public function listUser()
    {
        $users = User::get();
        return Inertia::render('Admin/ListUser', [
            'users' => $users,
        ]);
    }
}
