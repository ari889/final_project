<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user() -> id;

        $data = DB::table('users')
            -> join('user_packages', 'user_packages.user_id', '=', 'users.id') -> where('users.id', $id) -> get();
        $user = User::find($id);
        if($user->payment_status == 0){
            return redirect()->route('payment.verify');
        }else{
            return view('home', [
                'user_data' => $data,
            ]);
        }
    }
}
