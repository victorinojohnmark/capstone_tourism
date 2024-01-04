@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/img/ternate_seal_icon.png" alt="logo">
            {{ env('APP_NAME', 'Laravel') }}    
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white mb-3">
                    Verify Your Email Address
                </h1>

                @if (session('resent'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success!</span> A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <p>Before proceeding, please check your email for a verification link.</p>
                <p class="w-auto">If you did not receive the email
                    <form class="inline items-center font-medium text-blue-600 dark:text-blue-500" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="">{{ __('click here to request another') }}</button>
                    </form>
                </p>

                
            </div>
        </div>
    </div>
</section>
@endsection
