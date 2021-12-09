@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6">
            <h1 class="text-3xl font-semibold text-blue-400 m-6 ml-0">Dashboard</h1>
            <hr>
            <br>
            <div class="mb-4 m-6">
                <span class="text-red-500 text-2xl font-bold">#{{ $rank+1 }}</span>
                <a href="" class="font-bold text-lg">{{ auth()->user()->username }} </a><span class="mb-2 text-gray-600 text-sm text-green-500">Member since {{ auth()->user()->created_at->diffForHumans() }}</span>
                <form action="{{ route('dashboard') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="bio" class="sr-only">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg" >{{ auth()->user()->bio ?? 'Say something about yourself.'}}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Save</button>
                    </div>
                </form>
                <br>
                <p><span class="mb-2 text-gray-600">{{ auth()->user()->likes->count() }} {{ Str::plural('like', auth()->user()->likes->count()) }}</span></p>
                @auth
                    @if (auth()->user()->id !== auth()->user()->id)
                        <div class="flex items-center">
                            @if (!auth()->user()->likedBy(auth()->user()))
                                <form action="{{ route('ranks.likes', auth()->user()) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500 text-sm">Like</button>
                                </form>
                            @else
                                <form action="{{ route('ranks.likes', auth()->user()) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500 text-sm">Unlike</button>
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection