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
            <div id="aboutUsContent" class="w-full md:w-2/3 p-3">
                {!! $information->about_us_content !!}
            </div>
            <div id="aboutUsContact" class="w-full md:w-1/3 p-3">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    {{-- <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Contact Information</h5> --}}
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Contact Person: </strong>{{ $information->contact_person }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Contact No: </strong>{{ $information->contact_no }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Email Address: </strong>{{ $information->email_address }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Address: </strong>{{ $information->address }}</p>
                </div>
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
