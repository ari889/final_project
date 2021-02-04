<?php

namespace App\Http\Controllers;

use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user() -> id;

        $data = DB::table('users')
            -> join('user_packages', 'user_packages.user_id', '=', 'users.id') -> where('users.id', $id) -> get();

        return view('home', [
            'user_data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexShow(){
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile(){
        $user_data = User::find(Auth::user() -> id);
        return view('profile', [
            'user_data' => $user_data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function help(){
        return view('help');
    }

    /**
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
            'name' => Auth::user() -> first_name.' '.Auth::user() -> last_name,
            'email' => Auth::user() -> email,
            'message' => $request -> message,
            'subject' => $request -> subject
        );

        Mail::to('support@mycryptopoolmirror.com') -> send(new SendMail($data));
        return back() -> with('success', 'Request send successfully');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pool(){
        return view('pool');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function passwordChange(Request $request){
        $user = User::find($request -> user_id);

        if(password_verify($request -> old_password, $user['password'])){
            if($request -> new_password === $request -> confirm_password){
                if($request -> old_password === $request -> new_password){
                    return '<div class="alert alert-warning"><strong>Warning!</strong> Please try another password. <button class="close" data-dismiss="alert" type="button">&times;</button></div>';
                }else{
                    $user -> password = password_hash($request -> new_password, PASSWORD_DEFAULT);
                    $user -> update();
                    if($request -> is_login == false) {
                        Auth::logout();
                        return route('login');
                    }else{
                        return '<div class="alert alert-success"><strong>Success!</strong> Password updated successful. <button class="close" data-dismiss="alert" type="button">&times;</button></div>';
                    }
                }
            }else{
                return '<div class="alert alert-warning"><strong>Warning!</strong> Password not matched. <button class="close" data-dismiss="alert" type="button">&times;</button></div>';
            }
        }else{
            return '<div class="alert alert-danger"><strong>Danger!</strong> Password doesn\'t matched. <button class="close" data-dismiss="alert" type="button">&times;</button></div>';
        }
    }


    /**
     * @param Request $request
     * @return string
     */
    public function nameChange(Request $request){
        $user = User::find(Auth::user() -> id);

        $user -> first_name = $request -> first_name;
        $user -> last_name = $request -> last_name;
        $user -> update();

        return '<div class="alert alert-success"><strong>Success!</strong> Data updated successful. <button class="close" data-dismiss="alert" type="button">&times;</button></div>';
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function referral(){
        $user_data = User::find(Auth::user() -> id);
        $referrad_user = DB::table('user_packages')
            -> join('users', 'user_packages.user_id', '=', 'users.id') -> where('user_packages.referral_id', Auth::user() -> id) -> get();
        return view('referral', [
            'user_data' => $user_data,
            'referral' => $referrad_user,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateImage(Request $request, $id){
        $data = User::find($id);

        $this -> validate($request, [
           'photo' => 'required | mimes:jpeg,jpg,png,gif,png',
        ],[
            'photo.required' => 'Please select an image before.'
        ]);

        if($request -> hasFile('photo')){
            $file = $request -> file('photo');
            $unique_name = md5(time().rand()).'.'.$file -> getClientOriginalExtension();
            $file -> move('media/profileImages', $unique_name);

            if(!empty($data -> photo) && file_exists('media/profileImages/'.$data -> photo)){
                unlink('media/profileImages/'.$data -> photo);
            }
        }

        $data -> photo = $unique_name;
        $data -> update();

        return redirect() -> back() -> with('success', 'Images updated successful');

    }

    public function confirmEmail($token){
        $data = User::where('remember_token', $token) -> get() -> first();
        if($data -> mail_activation_status === 'pending'){
            $data -> mail_activation_status = 'active';
            $data -> email_verified_at = Carbon::now();
            $data -> update();
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
