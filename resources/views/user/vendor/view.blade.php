@extends('layouts.app')

@section('content')
<div class="w-full my-5">
    <div class="container mx-auto px-3 md:px-0">
        {{-- <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2> --}}
        {{-- <a href="/messenger/{{ $user->id }}" target="_blank" class="table text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Message Us</a><br> --}}
        {{-- <div class="w-full block font-light text-gray-500 text-base dark:text-gray-400 mb-6">{!! $user->information?->about_us_content !!}</div> --}}

        @if ($user->information)
        <section class="bg-white dark:bg-gray-900">
            <div class="gap-16 mx-auto lg:grid lg:grid-cols-2 lg:px-6">
                <div class="" id="aboutUsContent">
                   {!! $user->information->about_us_content !!}
                </div>
                <div class="8">
                    <img class="w-full rounded-lg aspect-square object-cover object-center" src="/storage/gallery/{{ $user->defaultImage->filename }}">
                </div>
            </div>
        </section>
        @else
        <p>No information posted yet.</p>
        @endif

        <section id="contactInformation" class="relative flex flex-col md:flex-row gap-4">
            @if ($user->information)
            <div class="w-full md:w-1/4">
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Contact Details</h4>
                <ul class="mb-4">
                    <li><strong>Contact Person: </strong>{{ $user->information->contact_person }}</li>
                    <li><strong>Contact No: </strong>{{ $user->information->contact_no }}</li>
                    <li><strong>Email Address: </strong>{{ $user->information->email_address }}</li>
                    <li><strong>Address: </strong>{{ $user->information->address }}</li>
                </ul>
                <a href="/inbox/{{ $user->id }}" class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Message Us</a>
            </div>
            @endif

            @if (isset($user->information->map_url))
            <div id="vendorMap" class="w-full md:w-3/4 mb-12">
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Map Location</h4>
                {!! $user->information->map_url !!}
            </div>
            @endif
        </section>
        
        
        
        <div class="relative block">
            <hr class="block my-3">
            <h3 class="text-gray-700 text-xl my-3">Gallery</h3>
            <div class="columns-2 md:columns-3 lg:columns-4 mt-6">
                @forelse ($user->galleries as $gallery)
                <div class="relative">
                    
                    <img class="mb-4 max-w-full hover:cursor-pointer"
                    src="/storage/gallery/{{ $gallery->filename }}" alt="">
                </div>
                @empty
                <div>
                    <img src="https://placehold.co/600x400?text=No%20upload%20image%20yet" alt="">
                </div>
                @endforelse
                
            </div>
        </div>
    </div>
</div>

{{-- <div class="w-full">
    <iframe src="{{ $user->map_url }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> --}}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
    
@endsection
