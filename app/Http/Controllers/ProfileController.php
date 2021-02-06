<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
     * load profile view with user data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile(){
        $user = User::find(Auth::user() -> id);
        if($user->payment_status == 0){
            return redirect()->route('payment.verify');
        }else{
            return view('profile', [
                'user_data' => $user,
            ]);
        }
    }

    /**
     * change password from profile page
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
     * change name from profile page
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
     * update profile image from profile controller
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
}
