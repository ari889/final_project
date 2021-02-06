<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailConfirmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * active account after confirm email
     * @param $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function confirmEmail($token){
        $user = User::find(Auth::user() -> id);
        if($user->payment_status == 0){
            return redirect()->route('register.payment');
        }else if($user->payment_status == 1){
            return redirect()->route('payment.verify');
        }else{
            $data = User::where('remember_token', $token) -> get() -> first();
            if($data->mail_activation_status === 'pending'){
                $data->mail_activation_status = 'active';
                $data->email_verified_at = Carbon::now();
                $data->update();
                return view('active', [
                    'status' => 'success'
                ]);
            }else{
                return view('active', [
                    'status' => 'error'
                ]);
            }
        }

    }
}
