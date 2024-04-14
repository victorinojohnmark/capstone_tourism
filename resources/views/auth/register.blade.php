@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden">
    <div class="absolute -z-10 w-[110%] h-[110%] overflow-hidden">
        {{-- video here as background --}}
        <video autoplay muted loop class="absolute -top-3 right-5 z-0 w-full h-full object-cover filter blur-md">
            <source src="/video/sea.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/img/ternate_seal_icon.png" alt="logo">
            Ternate Tourism    
        </a>
        <div class="md:max-w-4xl mx-auto w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                
                <form class="" action="{{ route('register') }}" method="POST">
                    @csrf
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl mb-4 dark:text-white">
                        Sign Up
                    </h1>
                    <div class="flex flex-col md:flex-row items-start justify-center  gap-x-4 mb-4 w-full">
                        
                        <div class="space-y-4 md:space-y-6 w-full">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required="">
                                @error('name')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
        
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@gmail.com" required="">
                                @error('email')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                @error('password')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                @error('password_confirmation')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            
                        </div>
    
                        <div class="space-y-4 md:space-y-6 w-full">
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Type</label>
                                <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required onchange="toggleBusinessFields()">
                                    <option value="{{ null }}" selected disabled>Select here...</option>
                                    <option value="Tourist">Tourist</option>
                                    <option value="Vendor">Vendor</option>
                                </select>
                                @error('type')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        
                            <div id="businessTypeContainer" style="display: none;">
                                <label for="business_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Type</label>
                                <select id="business_type" name="business_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="{{ null }}" selected disabled>Select here...</option>
                                    <option>Beach Resort</option>
                                    <option>Restaurant</option>
                                    <option>Products and Delicacies</option>
                                </select>
                                @error('business_type')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        
                            <div id="businessNameContainer" style="display: none;">
                                <label for="business_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
                                <input type="text" name="business_name" id="business_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aristocrat">
                                @error('business_name')
                                    <small class="text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an account</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
                            </p>
                        </div>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
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
