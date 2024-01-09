@extends('layouts.system')

@section('content')
<section class="w-full">
    <div class="w-full flex items-center justify-between">
        <h3 class="text-gray-700 text-3xl inline-flex">About Us</h3>
        <div class="options inline-flex">
            
            @if (!$information)
                <button data-modal-target="information-modal" data-modal-toggle="information-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
            @else
                <button data-modal-target="information-modal" data-modal-toggle="information-modal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
            @endif

            @include('user.business-information.business-information-modal')
            
        </div>
    </div>
    @include('layouts.message')

    @if ($information)
        <div class="flex flex-col md:flex-row">
            <div class="aboutUsContent w-full md:w-2/3 p-3">
                {!! $information->about_us_content !!}
            </div>
            <div class="aboutUsContact w-full md:w-1/3 p-3">
                
            </div>
        </div>
        
    @else
        <p>{{ 'No Information set yet' }}</p>
    @endif
    

</section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@endsection

@section('scripts')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '.tinymce-editor'
            });
        });
    </script>
@endsection
