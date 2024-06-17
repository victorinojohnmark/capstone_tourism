@extends('layouts.system')

@section('content')
<h3 class="text-3xl font-bold dark:text-white mb-3">Accounts</h3>
<div class="inline-flex rounded-md shadow-sm mb-5" role="group">
    <a href="{{ route('admin.account.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        All
    </a>
    <a href="{{ route('admin.account.index', ['type' => 'Vendor', 'business_type' => 'Restaurant']) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Restaurants
    </a>
    <a href="{{ route('admin.account.index', ['type' => 'Vendor', 'business_type' => 'Beach Resort']) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Beach Resorts
    </a>
    <a href="{{ route('admin.account.index', ['type' => 'Vendor', 'business_type' => 'Products and Delicacies']) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Products and Delicacies
    </a>
    <a href="{{ route('admin.account.index', ['type' => 'Tourist']) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Tourists
    </a>
</div>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Type
            </th>
            <th scope="col" class="px-6 py-3">
                Business Type
            </th>
            {{-- <th scope="col" class="px-6 py-3">
                Business Name
            </th> --}}
            <th scope="col" class="px-6 py-3">
                Option
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 !py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $user->name }}
            </th>
            <td class="px-6 !py-4">
                {{ $user->type }}
            </td>
            <td class="px-6 !py-4">
                {{ $user->business_type ?? '-' }}
            </td>
            {{-- <td class="px-6 !py-4">
                {{ $user->business_name ?? '-' }}
            </td> --}}
            <td class="px-6 !py-4">
                <button data-modal-target="viewAccountModal{{ $user->id }}" data-modal-toggle="viewAccountModal{{ $user->id }}" class="inline mx-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    View Details
                </button>
                @include('account.account-view-modal')

                <button data-modal-target="deleteAccountModal{{ $user->id }}" data-modal-toggle="deleteAccountModal{{ $user->id }}" class="inline mx-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                    Delete
                </button>
                @include('account.account-delete-modal')

                @if ($user->is_on_hold)
                    @if ($user->is_vendor)
                    <button data-modal-target="openAccountModal{{ $user->id }}" data-modal-toggle="openAccountModal{{ $user->id }}" class="inline mx-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                        Open Account
                    </button>
                    @endif
                @include('account.account-open-modal')
                @else
                    @if ($user->is_vendor)
                    <button data-modal-target="holdAccountModal{{ $user->id }}" data-modal-toggle="holdAccountModal{{ $user->id }}" class="inline mx-1 text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800" type="button">
                        Hold Account
                    </button>
                    @include('account.account-hold-modal')
                    @endif
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No record/s found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
