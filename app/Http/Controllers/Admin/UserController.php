<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /*User::create([
           'name'=>'محمد',
           'email'=>'mohammad@gmail.com',
            'password'=>bcrypt(12345678)
        ]);*/
        $this->authorize('show-users');
        $users=User::latest()->paginate(20);
        return view('Admin.users.all' , compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
