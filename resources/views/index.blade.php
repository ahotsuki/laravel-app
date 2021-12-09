@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6">
            <h1 class="text-3xl font-semibold text-blue-400 m-6 ml-0">Hello Popular Space!</h1>
            <hr>
            <p class="text-lg text-gray-400 mt-2 mb-2 ml-6">Sign up to see how popular you are among all the members!</p>
            @if ($user)       
                <h2 class="text-xl text-green-400 m-2 ml-6">Check out our top idol!</h2>
                <div class="mb-4 m-6">
                    <span class="text-red-500 text-2xl font-bold">#1</span>
                    <form action="{{ route('user', $user) }}" method="get" class="inline">
                        @csrf
                        <button type="submit" class="font-bold text-lg">{{ $user->username }} </button>
                    </form>
                    <span class="mb-2 text-gray-600 text-sm text-green-500">Member since {{ $user->created_at->diffForHumans() }}</span>
                    @if ($user->bio != null)
                    <p><span class="ml-5 mb-2 text-gray-600 text-sm">{{$user->bio}}</span></p>
                    @else
                    <p><span class="mb-2 ml-5 text-gray-600 text-sm">No bio to show.</span></p>
                    @endif
                    <p><span class="mb-2 text-gray-600">{{ $user->likes->count() }} {{ Str::plural('like', $user->likes->count()) }}</span></p>
                    @auth
                        @if ($user->id !== auth()->user()->id)
                            <div class="flex items-center">
                                @if (!$user->likedBy(auth()->user()))
                                    <form action="{{ route('ranks.likes', $user) }}" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500 text-sm">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('ranks.likes', $user) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500 text-sm">Unlike</button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
@endsection