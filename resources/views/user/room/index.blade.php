@extends('layouts.system')

@section('content')
@include('layouts.message')
<div class="w-full flex items-center justify-between">
    <div>
        <h3 class="text-gray-700 text-3xl">Rooms</h3>
    </div>
    <div class="options inline-flex">
        <button data-modal-target="room-modal" data-modal-toggle="room-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Room</button>
        @include('user.room.room-form')
    </div>
</div>

<hr class="my-4">

<div class="flex flex-wrap gap-4">
    @forelse ($rooms as $room)
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#" data-modal-target="room-modal{{ $room->id ?? null }}" data-modal-toggle="room-modal{{ $room->id ?? null }}">
            <div class="relative overflow-hidden">
                <img class="rounded-t-lg object-cover aspect-video w-96" src="/storage/rooms/{{ $room->image }}" alt="" />
                <span class="z-10 absolute top-0 right-0 px-3 py-1 text-xs font-bold leading-none text-white bg-green-500 rounded-bl-lg rounded-tr-lg">{{ $room->capacity }} pax</span>
            </div>
        </a>
        @include('user.room.room-form')
        <div class="p-5">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $room->name }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $room->description }}</p>
            {{-- <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button> --}}
        </div>
    </div>
    @empty
        
    @endforelse
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="css/custom.css">
@endsection
