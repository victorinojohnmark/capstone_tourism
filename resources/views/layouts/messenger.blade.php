<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Bebas-Neue" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        window.csrfToken = @json(csrf_token());
    </script>
    @yield('scripts')
</head>
<body>
    <div id="app">
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <nav
                class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="flex justify-start items-center">
                        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                            aria-controls="drawer-navigation"
                            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Toggle sidebar</span>
                        </button>
                        <a href="/" class="flex items-center justify-between mr-4">
                            <img src="/img/ternate_seal.png" class="mr-3 h-8"
                                alt="Ternate Tourism" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ternate Tourism</span>
                        </a>
                        
                    </div>
                    <div class="flex items-center lg:order-2">


                        <button type="button"
                            class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://www.jea.com/cdn/images/avatar/avatar-alt.svg"
                                alt="user photo" />
                        </button>
                        <!-- Dropdown menu -->
                        <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 md:rounded-xl"
                            id="dropdown">
                            <div class="py-3 px-4">
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                                <span
                                    class="block text-sm text-gray-900 truncate dark:text-white">{{ auth()->user()->email }}</span>
                            </div>

                            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->

            <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidenav" id="drawer-navigation">
                <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                    <ul class="space-y-2">
                        @if (auth()->user()->is_admin)
                            @include('layouts.admin-menu')
                        @else
                            @include('layouts.business-menu')
                        @endif
                        <li>
                            <a href="/inbox" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <x-heroicon-s-chat-bubble-left-right class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                                <span class="ml-3">Inbox</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </aside>

            <main class="md:ml-64 min-h-[calc(100vh-40px)] md:pt-[52px]">
                @yield('content')
            </main>
        </div>
    </div>
    


    @auth
    <script>
        window.authUser = @json(auth()->user());
    </script>
    @else
    <script>
        window.authUser = null;
    </script>
    @endauth
</body>
</html>
