@extends('layouts.system')

@section('content')
<h3 class="text-3xl font-bold dark:text-white mb-3">Reservations</h3>
{{-- <div class="inline-flex rounded-md shadow-sm mb-5" role="group">
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
</div> --}}

@include('layouts.message')

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @if (Auth::user()->is_beach_resort_owner)
                <th scope="col" class="px-6 py-3">
                    Name
                </th>

                <th scope="col" class="px-6 py-3">
                    Contact No.
                </th>
            @endif
            @if (Auth::user()->is_tourist)
            <th scope="col" class="px-6 py-3">
                Beach & Resort
            </th>
            @endif
            
            <th scope="col" class="px-6 py-3">
                Type
            </th>
            <th scope="col" class="px-6 py-3">
                Check In
            </th>
            <th scope="col" class="px-6 py-3">
                Check Out
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Option
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reservations as $reservation)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @if (Auth::user()->is_beach_resort_owner)
                <th scope="row" class="px-6 !py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->tourist->name }}
                </th>

                <td class="px-6 !py-4">
                    {{ $reservation->tourist->contact_no ?? 'N/A' }}
                </td>

            @endif
            @if (Auth::user()->is_tourist)
                <td class="px-6 !py-4">
                    {{ $reservation->vendor->name }}
                </td>
            @endif
            <td class="px-6 !py-4">
                {{ $reservation->tour_type }}
            </td>
            <td class="px-6 !py-4">
                {{ \Carbon\Carbon::parse($reservation->check_in)->format('F j, Y') }}
            </td>
            <td class="px-6 !py-4">
                {{ \Carbon\Carbon::parse($reservation->check_out)->format('F j, Y') }}
            </td>

            <td class="px-6 !py-4">
                {{ $reservation->status }}
            </td>

            <td class="px-6 !py-4">
                @if (Auth::user()->is_beach_resort_owner && !$reservation->is_approved)
                <button data-modal-target="approveReservationModal{{ $reservation->id }}" data-modal-toggle="approveReservationModal{{ $reservation->id }}" class="inline mx-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Approve
                </button>
                @include('reservation.reservation-approve-modal')
                @endif

                <button data-modal-target="deleteReservationModal{{ $reservation->id }}" data-modal-toggle="deleteReservationModal{{ $reservation->id }}" class="inline mx-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                    Delete
                </button>
                @include('reservation.reservation-delete-modal')
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
