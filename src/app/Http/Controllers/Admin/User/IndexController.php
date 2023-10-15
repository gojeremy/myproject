<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }
}
