<?php

namespace App\Http\Controllers;

use App\ActivationCode;
use App\Course;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use SoapClient;

class UserController extends Controller
{
    protected $MerchantID = 'f83cc956-f59f-11e6-889a-005056a205be'; //Required

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

    public function vipPayment()
    {
        \request()->validate([
            'plan' => 'required'
        ]);

        switch (\request('plan')) {
            case 3 :
                $price = 30000;
                break;
            case 12 :
                $price = 120000;
                break;
            default:
                $price = 100;
        }

        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = user()->email; // Optional
        $CallbackURL = route('user.panel.vip.checker'); // Required

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $price,
                'Description' => $Description,
                'Email' => $Email,
//                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {

            auth()->user()->payments()->create([
                'resnumber' => $result->Authority,
                'price' => $price,
            ]);

            return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }

    public function vipChecker()
    {
        $Authority = \request('Authority');

        $payment = Payment::where('resnumber', $Authority)->firstOrFail();
        $course = Course::findOrFail($payment->course_id);

        if (request('Status') == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->price,
                ]
            );

            if ($result->Status == 100) {
                if ($this->checkPayment($payment)) {
                    Alert::success('عملیات مورد نظر با موفقیت انجام شد', 'با تشکر');
                    return redirect(route('user.panel'));
                }
            } else {
                echo 'Transaction failed. Status:' . $result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }
    }

    public function checkPayment($payment)
    {
        $payment->update(['payment' => 1]);

        switch ($payment->price) {
            case 100 :
                $time = 1;
//                $type = 'month';
                break;
            case 30000 :
                $time = 3;
//                $type = '3month';
                break;
            case 120000 :
                $time = 12;
//                $type = '12month';
                break;
        }

        $user = $payment->user;
        $viptime = $user->isActive() ? Carbon::parse($user->viptime) : Carbon::now();
        $user->update([
            'viptime' => $viptime->addMonths($time),
        ]);

        return true;
    }
}
