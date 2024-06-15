@extends('layouts.system')

@section('content')
@include('layouts.message')
<div class="w-full flex items-center justify-between">
    <div>
        <h3 class="text-gray-700 text-3xl">Gallery</h3>
        <p class="inline">Images that are publicly viewable in your gallery section</p>
    </div>
    <div class="options inline-flex">
            <button data-modal-target="image-modal" data-modal-toggle="image-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Image</button>
            @include('user.gallery.gallery-form')
    </div>
</div>

<hr class="my-4">

<div class="columns-2 md:columns-3 lg:columns-4">
    @forelse (auth()->user()->galleries as $gallery)
    <div class="relative">
        <button type="button" class="absolute top-1 right-1 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="image-delete-modal{{ $gallery->id }}" data-modal-toggle="image-delete-modal{{ $gallery->id }}">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Delete Image</span>
        </button>
        @if ($gallery->is_default)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
            class="w-6 h-6 absolute top-1 left-1 text-green-400/40">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>  
        @endif
        
        @include('user.gallery.gallery-delete-modal')
        <img class="mb-4 max-w-full hover:cursor-pointer" @if (!$gallery->is_default) data-modal-target="image-set-default-modal{{ $gallery->id }}" data-modal-toggle="image-set-default-modal{{ $gallery->id }}" @endif
         src="/storage/gallery/{{ $gallery->filename }}" alt="">
        
        @if (!$gallery->is_default)
            @include('user.gallery.gallery-set-default-modal')
        @endif
        

    </div>
    @empty
     <div>
        <img src="https://placehold.co/600x400?text=No%20upload%20image%20yet" alt="">
     </div>
    @endforelse
    
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@endsection

@section('scripts')
    <script src="/js/custom.js"></script>
@endsection

