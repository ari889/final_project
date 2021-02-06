<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnPayment extends Controller
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

    public function paymentReturn( Request $request ){
        print_r($request);
        die();
        return 'Done';
    }

    public function paymentCancel( Request $request ){
        return $request;
    }
}
