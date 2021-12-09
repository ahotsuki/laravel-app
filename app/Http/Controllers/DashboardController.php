<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Request $request){
        $user = User::find($request->user()->id);
        $users = User::with(['likes'])->get()->sortByDesc(function($user){
            return $user->likes->count();
        })->toArray();
        $rank = array_search($user->id, array_column($users, 'id'));
        
        return view('dashboard', ['rank' => $rank]);
    }

    public function store(Request $request){
        $user = User::find($request->user()->id);
        $user->bio = $request->bio;
        $user->save();
        return back();
    }
}
