@extends('layouts.app')

@section('content')
    <div class="flex-1 h-full">
        {{-- (v-bind) :current-user에 유저의 id를 담아서  아래 컴포넨트로 props로 보낸다.  --}}
        {{-- :friend-list = "{{ $friends }}"  --}}
        <the-chat 
            :current-user="{{ auth()->id() }}"                
        / >
    </div>
@endsection
