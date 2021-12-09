<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserLikeController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(User $user){
        $users = User::with(['likes'])->get()->sortByDesc(function($user){
            return $user->likes->count();
        })->toArray();
        $rank = array_search($user->id, array_column($users, 'id'));
        return view('page', ['user' => $user, 'rank'=>$rank]);
    }

    public function store(User $user, Request $request){

        if($user->likedBy($request->user())){
            return response(null, 409);
        }

        $user->likes()->create([
            'user_id' => $user->id,
            'source' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(User $user, Request $request){

        $user->likes()->where('source', $request->user()->id)->delete();
        return back();
    }
}
