<?php

namespace App\Http\Controllers;

use App\ActivationCode;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activation($token)
    {
        $activationCode = ActivationCode::whereCode($token)->first();

        if (!$activationCode) {
            dd('not exist');
            return redirect('/');
        }

        if ($activationCode->expire < Carbon::now()) {
            dd('expired');
            return redirect('/');
        }

        if ($activationCode->used == true) {
            dd('used');
            return redirect('/');
        }

        $activationCode->user()->update([
            'active' => 1
        ]);

        $activationCode->update([
            'used' => true
        ]);

        return redirect('/');
    }

    public function index()
    {
        return view('Home.panel.index');
    }

    public function history()
    {
        $payments = auth()->user()->payments()->latest()->paginate(20);
        return view('Home.panel.history', ['payments' => $payments]);
    }

    public function vip()
    {
        return view('Home.panel.vip');
    }
}
