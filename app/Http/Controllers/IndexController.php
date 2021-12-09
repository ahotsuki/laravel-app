<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $user = User::with(['likes'])->get()->sortByDesc(function($user){
            return $user->likes->count();
        })->first();
        return view('index', ['user' => $user]);
    }
}
