@extends('layouts.app')

@section('content')
    <div class="flex-1 h-full">
        <!-- current-user 아래 component로 값을 보내는 방법   -->
        <chat-component :current-user="{{auth() -> id()}}"></chat-component>
    </div>    
@endsection



