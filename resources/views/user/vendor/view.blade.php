@extends('layouts.app')

@section('content')
<div class="w-full my-5">
    <div class="container mx-auto px-3 md:px-0">
        {{-- <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2> --}}
        {{-- <a href="/messenger/{{ $user->id }}" target="_blank" class="table text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Message Us</a><br> --}}
        {{-- <div class="w-full block font-light text-gray-500 text-base dark:text-gray-400 mb-6">{!! $user->information?->about_us_content !!}</div> --}}

        <section class="bg-white dark:bg-gray-900">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">We didn't reinvent the wheel</h2>
                    <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.</p>
                    <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick.</p>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
                    <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
                </div>
            </div>
        </section>
        
        @if ($user->information)
        <br><br>
        <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Contact Details</h4>
        <ul class="mb-4">
            <li><strong>Contact Person: </strong>{{ $user->information->contact_person }}</li>
            <li><strong>Contact No: </strong>{{ $user->information->contact_no }}</li>
            <li><strong>Email Address: </strong>{{ $user->information->email_address }}</li>
            <li><strong>Address: </strong>{{ $user->information->address }}</li>
        </ul>
        @endif
        {{-- <a href="/messenger/{{ $user->id }}" class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Message</button> --}}
        
        <hr class="block">
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

{{-- <div class="w-full">
    <iframe src="{{ $user->map_url }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> --}}
@if (isset($user->information->map_url))
<section id="vendorMap">
    {!! $user->information->map_url !!}
</section>
@endif
@endsection

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@endsection
