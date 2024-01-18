@extends('layouts.system')

@section('content')
<section class="w-full">
    <div class="w-full flex items-center justify-between">
        <h3 class="text-gray-700 text-3xl inline-flex">Update Profile</h3>
        {{-- <div class="options inline-flex">

        </div> --}}
    </div>
    @include('layouts.message')

    <form class="" action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row items-start justify-center  gap-x-4 mb-4 w-full">
            
            <div class="space-y-4 md:space-y-6 w-full">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? null) }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required="">
                    @error('name')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
    
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? null) }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@domain.com" required="">
                    @error('email')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('password')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('password_confirmation')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
    
                
            </div>
    
            <div class="space-y-4 md:space-y-6 w-full">
                <div>
                    @php
                        $types = ['Tourist', 'Vendor'];
                    @endphp
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Type</label>
                    <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required onchange="toggleBusinessFields()">
                        @forelse ($types as $type)
                            <option value="{{ $type }}" {{ $user->type == $type ? 'selected' : null }}>{{ $type }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('type')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            
                <div id="businessTypeContainer" 
                    @if ($user->type == 'Tourist')
                        style="display: none;"
                    @endif>
                    @php
                        $businessTypes = ['Beach Resort', 'Restaurant', 'Products and Delicacies'];
                    @endphp
                    <label for="business_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Type</label>
                    <select id="business_type" name="business_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @forelse ($businessTypes as $businessType)
                            <option {{ $user->business_type == $businessType ? 'selected' : null }}>{{ $businessType }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('business_type')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            
                <div id="businessNameContainer" 
                    @if ($user->type == 'Tourist')
                        style="display: none;"
                    @endif>
                    <label for="business_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
                    <input type="text" name="business_name" value="{{ old('business_name', $user->business_name ?? null) }}" id="business_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aristocrat">
                    @error('business_name')
                        <small class="text-red-400" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            
                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                
            </div>
        </div>
        
        
        
    </form>
    

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

        function toggleBusinessFields() {
            var typeSelect = document.getElementById('type');
            var businessTypeContainer = document.getElementById('businessTypeContainer');
            var businessNameContainer = document.getElementById('businessNameContainer');
            var businessTypeSelect = document.getElementById('business_type');
            var businessNameInput = document.getElementById('business_name');

            if (typeSelect.value === 'Tourist') {
                businessTypeContainer.style.display = 'none';
                businessNameContainer.style.display = 'none';
                businessTypeSelect.removeAttribute('required');
                businessNameInput.removeAttribute('required');
                // Clear the values when switching to "Tourist"
                businessTypeSelect.value = '';
                businessNameInput.value = '';
            } else {
                businessTypeContainer.style.display = 'block';
                businessNameContainer.style.display = 'block';
                businessTypeSelect.setAttribute('required', 'required');
                businessNameInput.setAttribute('required', 'required');
            }
        }
    </script>
@endsection
