@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6">
            <h1 class="text-3xl font-semibold text-blue-400 m-6 ml-0">User {{$user->id}}</h1>
            <hr>
            <div class="mb-4 m-6">
                <span class="text-red-500 text-2xl font-bold">#{{ $rank+1 }}</span>
                <a href="" class="font-bold text-lg">{{ $user->username }} </a><span class="mb-2 text-gray-600 text-sm text-green-500">Member since {{ $user->created_at->diffForHumans() }}</span>
                @if ($user->bio != null)
                <p><span class="ml-5 mb-2 text-gray-600 text-sm">{{$user->bio}}</span></p>
                @else
                <p><span class="mb-2 ml-5 text-gray-600 text-sm">No bio to show.</span></p>
                @endif
                <p><span class="mb-2 text-gray-600">{{ $user->likes->count() }} {{ Str::plural('like', $user->likes->count()) }}</span></p>
            </div>
        </div>
    </div>
@endsection