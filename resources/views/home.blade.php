@extends('layouts.app')

@section('content')
<section class="w-full">
    <div class="container mx-auto px-3 md:px-0">
        <div class="row justify-content-center">
            <h3>Dashboard</h3>
    
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    
            <p>You are logged in!</p>
    
        </div>
    </div>
</section>
@endsection
