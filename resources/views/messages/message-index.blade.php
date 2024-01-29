@extends('layouts.messenger')

@section('content')
<iframe src="/messenger/{{ $userid }}" class="w-full !min-h-[calc(100vh-53px)] h-full" frameborder="0"></iframe>


@endsection


