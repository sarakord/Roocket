<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanelController extends Controller
{

    public function index()
    {
        /*auth()->loginUsingId(1);*/
        $month = 12;
        $paymentsuccess = Payment::SpanningPayment($month, true);
        $paymentUnsuccess = Payment::SpanningPayment($month, false);

        $labels = $this->getLastMonths($month);

        $values['success'] = $this->CheckCount($paymentsuccess->pluck('published'), $month);
        $values['unsuccess'] = $this->CheckCount($paymentUnsuccess->pluck('published'), $month);

        return view('Admin.panel', compact('values', 'labels'));
    }


    public function uploadImageSubject()
    {
        $this->validate(request(), [
            'upload' => 'required | mimes:jpg,png,jpeg,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        if (file_exists(public_path($imagePath) . $filename)) ;
        {
            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath), $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1,'$url' ,'')</script>";
    }


    private function getLastMonths($month)
    {
        for ($i = 0; $i < $month; $i++) {
            $labels[] = jdate(Carbon::now()->subMonth($i))->format('%B');
        }
        return array_reverse($labels);
    }


    private function CheckCount($count, $month)
    {
        for ($i = 0; $i < $month; $i++) {
            $new[$i] = empty($count[$i]) ? 0 : $count[$i];
        }
        return array_reverse($new);
    }
}
