@extends('layouts.system')

@section('content')
<section class="w-full">
    <h3>Dashboard</h3>
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
</section>
@endsection
