{{-- <li>
    <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <x-heroicon-s-home class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
        <span class="ml-3">Overview</span>
    </a>
</li> --}}
<li>
    <a href="{{ route('user.business.show') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <x-heroicon-s-building-storefront class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
        <span class="ml-3">About Us</span>
    </a>
</li>
<li>
    <a href="/user/galleries" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <x-heroicon-s-photo class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
        <span class="ml-3">Gallery</span>
    </a>
</li>
<li>
    <a href="/messenger" target="_blank" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <x-heroicon-s-chat-bubble-left-right class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
        <span class="ml-3">Messenger</span>
    </a>
</li>