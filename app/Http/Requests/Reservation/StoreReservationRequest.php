<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\GuestCountNotExceedCapacity;
use App\Rules\DateRangeAvailable;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // dd($this->input());
        $rules = [
            'user_id' =>'required|exists:users,id',
            'vendor_id' =>'required|exists:users,id',
            'tour_type' =>'required|string',
            'check_in' =>'required|date_format:Y-m-d H:i:s',
            'check_out' =>'required|date_format:Y-m-d H:i:s',
            'is_approved' => 'nullable|boolean',
            'room_id' =>'required|exists:rooms,id',
            'guest_count' => ['required', 'integer', 'min:1', new GuestCountNotExceedCapacity($this->input('room_id'))],
        ];

        // Add the custom rule conditionally if the required fields are present
        if ($this->input('room_id') && $this->input('check_in') && $this->input('check_out') && $this->input('tour_type')) {
            $rules['check_in'] = ['required', 'date_format:Y-m-d H:i:s', new DateRangeAvailable($this->input('room_id'), $this->input('check_in'), $this->input('check_out'), $this->input('tour_type'))];
            $rules['check_out'] = ['required', 'date_format:Y-m-d H:i:s']; // You may add a similar validation here if needed.
       }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'room_id.required' => 'The room field is required.',
            'check_in.required' => 'The check-in date field is required.',
            'check_out.required' => 'The check-out date field is required.',
        ];
    }

    public function prepareForValidation()
    {

        $checkIn = $this->input('range.start');
        $checkOut = $this->input('range.end');
        $tourType = $this->input('type');

        if ($tourType === 'Day Tour') {
            $checkIn = $checkIn ? $checkIn . ' 08:00:00' : null;
            $checkOut = $checkOut ? $checkOut . ' 17:00:00' : null;
        } elseif ($tourType === 'Overnight') {
            $checkIn = $checkIn ? $checkIn . ' 18:00:00' : null;
            $checkOut = $checkOut ? $checkOut . ' 06:00:00' : null;
        }

        $this->merge([
            'user_id' => auth()->id(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'tour_type' => $tourType,
        ]);

        // remove range and type from the request
        $this->offsetUnset('range');
        $this->offsetUnset('type');
    }

}
