<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
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
     * return help view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function help(){
        $user = User::find(Auth::user()->id);
        if($user->payment_status == 0){
            return redirect()->route('register.payment');
        }else if($user->payment_status == 1){
            return redirect()->route('payment.verify');
        }else{
            return view('help');
        }
    }

    /**
     * send email from help page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createHelp(Request $request){
        $this -> validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = array(
            'name' => Auth::user()->first_name.' '.Auth::user() -> last_name,
            'email' => Auth::user()->email,
            'message' => $request->message,
            'subject' => $request->subject
        );

        Mail::to('support@mycryptopoolmirror.com') -> send(new SendMail($data));
        return back()->with('success', 'Request send successfully');
    }

}
