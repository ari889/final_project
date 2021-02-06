<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createSession(Request $request, $id){
        $data = User::find($id);
        if(!empty($data)){
            $data -> visit = $data -> visit + 1;
            $data -> update();
        }
//        $request->session()->forget('referral_id');

        return redirect('https://mycryptopoolmirror.com/') -> with('referral_id', $id);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        if(Auth::user()){
            return redirect() -> route('home');
        }else{
            return view('frontend.packages');
        }
    }

    /**
     * create package session
     * @param Request $request
     * @return string
     */
    public function create(Request $request){
//        Session::forget('package_name');
        $request->session()->forget('package_name');
        $request -> session() -> put('package_name', $request -> package_name);
        $request -> session() -> put('referral_id', $request -> referral_id);

        return route('register');
    }
}
