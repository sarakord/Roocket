<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserActivation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        /*if (auth()->validate($request->only('email', 'password'))) {
            $user = User::whereEmail($request->input('email'))->first();
            if ($user->active == 0) {
                $checkActiveCode = $user->activationCodes()->where('expire', '>=', Carbon::now())->latest()->first();

                if (count($checkActiveCode) == 1) {
                    if ($checkActiveCode->expire > Carbon::now()) {
                        $this->incrementLoginAttempts($request);
                        return back()->withErrors(['code' => 'ایمیل فعال سازی قبلا به ایمیل شما ارسال شد بعد از 15 دقیقه دوباره برای ارسال ایمیل لاگین کنید']);
                    }
                } else
                    event(new UserActivation($user));
            }
        }*/

        if(auth()->validate($request->only('email' , 'password'))) {
            $user = User::whereEmail($request->input('email'))->first();
            if($user->active == 0 ) {
                $checkActiveCode = $user->activationCodes()->where('expire' , '>=' , Carbon::now() )->latest()->first();
                $count= $checkActiveCode != null ? '1' : '0' ;
                if($count == 1) {
                    if($checkActiveCode->expire > Carbon::now() ) {
                        $this->incrementLoginAttempts($request);
                        return back()->withErrors(['code' => 'ایمیل فعال سازی قبلا به ایمیل شما ارسال شد بعد از 15 دقیقه دوباره برای ارسال ایمیل لاگین کنید']);
                    }
                } else {
                    event(new UserActivation($user));
                }
            }
        }


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

}
