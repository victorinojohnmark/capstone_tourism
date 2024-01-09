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
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if ($information)
        
    @else
    <p>{{ 'No Information set yet' }}</p>
    @endif
    

</section>
@endsection
