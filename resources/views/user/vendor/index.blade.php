@extends('layouts.app')

@section('content')
@forelse ($users as $user)
@php
    $image = $user->galleries->where('is_default', false)->first()
@endphp
{{-- <section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl flex flex-col md:flex-row lg:py-16 lg:px-6">
        <div class="w-full md:w-2/3 vendorIndexContent font-light text-gray-500 sm:text-lg dark:text-gray-400 {{ ($loop->index + 1) % 2 == 0 ? 'md:order-last': ''}}">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2>
            <div class="mb-4 max-h-32 truncate">{!! $user->information?->about_us_content !!}</div>
            <a href="/vendor/{{ $user->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
        </div>
        <div class="w-full md:1/3 grid grid-cols-2 items-center {{ ($loop->index + 1) % 2 == 0 ? 'justify-end': ''}} gap-4 mt-8">.
            <img class="w-full rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="{{ $user->default_image ? '/storage/gallery/'.$user->default_image->filename : 'https://placehold.co/300x400?text=No%20Image%20Available' }}" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="{{ $image ? '/storage/gallery/' . $image->filename : 'https://placehold.co/300x400?text=No%20Image%20Available' }}" alt="office content 2">
            
        </div>
    </div>
</section> --}}

<section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl flex flex-col md:flex-row lg:py-16 lg:px-6">
        <div class="w-full md:w-2/3 font-light text-gray-500 sm:text-lg dark:text-gray-400 text-right {{ ($loop->index + 1) % 2 == 0 ? 'md:order-last !text-left': ''}}">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2>
            <div class="mb-4 publicContent text-ellipsis overflow-hidden max-h-36">{!! $user->information?->about_us_content !!}</div>
            <a href="/vendors/{{ $user->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Read more</a>
        </div>
        <div class="w-full md:1/3 grid grid-cols-2 {{ ($loop->index + 1) % 2 == 0 ? 'justify-end': ''}} gap-4 mt-8">
            <img class="w-full rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="{{ $user->default_image ? '/storage/gallery/'.$user->default_image->filename : 'https://placehold.co/300x400?text=No%20Image%20Available' }}" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="{{ $image ? '/storage/gallery/' . $image->filename : 'https://placehold.co/300x400?text=No%20Image%20Available' }}" alt="office content 2">
        </div>
    </div>
</section>
@empty
    
@endforelse
  
@endsection

@section('css')
    <link rel="stylesheet" href="css/custom.css">
    <style>
        .publicContent img {
            display: none !important;
        }
    </style>
@endsection
