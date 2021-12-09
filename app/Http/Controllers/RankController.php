<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;


class RankController extends Controller
{
    public function index(){
        $users = User::with(['likes'])->get()->sortByDesc(function($user){
            return $user->likes->count();
        });
        return view('ranks', ['users' => $users]);
    }
}
