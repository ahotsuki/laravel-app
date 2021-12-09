@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6">
            <h1>Ranks</h1>

            @if ($users->count())
                @foreach ($users as $user)
                    <div class="mb-4">
                        <a href="" class="font-bold text-lg">{{ $user->username }} </a><span class="mb-2 text-gray-600 text-sm text-green-500">Member since {{ $user->created_at->diffForHumans() }}</span>
                        <p><span class="mb-2 text-gray-600">{{ $user->likes->count() }} {{ Str::plural('like', $user->likes->count()) }}</span></p>
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
                    </div>
                @endforeach

                {{-- {{ $users->links() }} --}}
            @else
                there are no users
            @endif
        </div>
    </div>
@endsection