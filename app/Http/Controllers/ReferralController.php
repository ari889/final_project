<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
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
     * return view referral with data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function referral(){
        $user = User::find(Auth::user() -> id);
        if($user->payment_status == 0){
            return redirect()->route('register.payment');
        }else if($user->payment_status == 1){
            return redirect()->route('payment.verify');
        }else{
            $referred_user = DB::table('user_packages')
                -> join('users', 'user_packages.user_id', '=', 'users.id') -> where('user_packages.referral_id', Auth::user() -> id) -> get();
            return view('referral', [
                'user_data' => $user,
                'referral' => $referred_user,
            ]);
        }
    }
}
