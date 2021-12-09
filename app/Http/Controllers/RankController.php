<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;


class RankController extends Controller
{
    //
    public function index(){
        // $users = User::paginate(10);
        $users = User::get()->sortByDesc(function($user){
            return $user->likes->count();
        });
        return view('ranks', ['users' => $users]);
    }
}
