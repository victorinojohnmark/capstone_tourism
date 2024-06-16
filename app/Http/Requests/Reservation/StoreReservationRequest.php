<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'user_id' =>'required|exists:users,id',
            'vendor_id' =>'required|exists:users,id',
            'tour_type' =>'required|string',
            'check_in' =>'required|date',
            'check_out' =>'required|date',
            'is_approved' => 'nullable|boolean',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'check_in' => $this->input('range.start'),
            'check_out' => $this->input('range.end'),
            'tour_type' => $this->input('type'),
        ]);

        // remove range and type from the request
        $this->offsetUnset('range');
        $this->offsetUnset('type');
    }
}
