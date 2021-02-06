<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * live user count
     * @param Request $request
     * @return int
     */
    public function getAllUser(Request $request){
        return User::all() -> count() + 300;
    }

    /**
     * if user go to the base link then return to home page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function baseLink(){
        return redirect()->route('home');
    }
}
