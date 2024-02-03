@extends('admin.layout')

@section('item_nav')
<div class="capitalize font-semibold text-lg text-zinc-400">
    <a href="{{ route('booking') }}" class="mx-1 px-2 py-1 transition-colors ease-in-out hover:animate-pulse hover:border-b-2 hover:border-green-600 hover:text-green-600 focus:text-green-600">booking</a>
    <a href="{{ route('user') }}" class="mx-1 px-2 py-1 transition-colors ease-in-out hover:animate-pulse hover:border-b-2 hover:border-green-600 hover:text-green-600 focus:text-green-600">user</a>
    <a href="{{ route('roomService') }}" class="mx-1 px-2 py-1 transition-colors ease-in-out hover:animate-pulse hover:border-b-2 hover:border-green-600 hover:text-green-600 text-green-600">room & services</a>
</div>
@endsection

@section('main')
    <livewire:tab-room-service>
@endsection