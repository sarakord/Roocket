<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')->where('payment', true)->latest()->paginate(20);
        return view('Admin.payments.all', ['payments' => $payments]);
    }

    public function unsuccessful()
    {
        $payments = Payment::with('user')->where('payment', 0)->latest()->paginate(20);
        return view('Admin.payments.unsuccessful', ['payments' => $payments]);
    }

    public function update(Payment $payment)
    {
        $payment->update(['payment' => true]);
        Alert::success('پرداخت تائید شد.')->autoClose($milliseconds = 5000)->showConfirmButton($btnText = 'بسیار خوب', $btnColor = '#3085d6');
        return back();
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        Alert::success('پرداخت با موفقیت حذف شد.')->autoClose($milliseconds = 5000)->showConfirmButton($btnText = 'بسیار خوب', $btnColor = '#3085d6');
        return back();
    }
}
