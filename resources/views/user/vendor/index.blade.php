@extends('layouts.app')

@section('content')
@forelse ($users as $user)

<section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl flex flex-col md:flex-row lg:py-16 lg:px-6">
        <div class="w-full md:w-2/3 vendorIndexContent font-light text-gray-500 sm:text-lg dark:text-gray-400 {{ ($loop->index + 1) % 2 == 0 ? 'md:order-last': ''}}">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2>
            <p class="mb-4">{!! $user->information?->about_us_content !!}</p>
        </div>
        <div class="w-full md:1/3 grid {{ count($user->galleries) > 1 ? 'grid-cols-2' : '' }} {{ ($loop->index + 1) % 2 == 0 ? 'justify-end': ''}} gap-4 mt-8">
            <img class="w-full rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="/storage/gallery/{{ $user->default_image->filename }}" alt="office content 1">
            @if (count($user->galleries) > 1)
            <img class="mt-4 w-full lg:mt-10 rounded-lg object-cover object-center max-w-[300px] h-[300px] md:h-[400px]" src="/storage/gallery/{{ $user->galleries->where('is_default', false)->first()->filename }}" alt="office content 2">
            @endif
            
        </div>
    </div>
</section>
@empty
    
@endforelse
  
@endsection

@section('css')
    <link rel="stylesheet" href="css/custom.css">
@endsection
