<x-site-layout title="List of writers on this blog">

    <ul class="list-disc pl-5">
        @foreach($users as $user)
            <li>
                <a href="{{route('users.show', $user->id)}}">
                    <span class="font-semibold">{{$user->name}}</span>
                    <span class="text-sm">{{$user->email}}</span>
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>
