<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;
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
        $rules = [
            'user_id' =>'required|exists:users,id',
            'vendor_id' =>'required|exists:users,id',
            'tour_type' =>'required|string',
            'check_in' =>'required|date',
            'check_out' =>'required|date',
            'is_approved' => 'nullable|boolean',
            'room_id' =>'required|exists:rooms,id',
            'guest_count' =>'required|integer|min:1',
        ];

        // Add the custom rule conditionally if the required fields are present
        if ($this->input('room_id') && $this->input('check_in') && $this->input('check_out')) {
            $rules['date_range'] = [new DateRangeAvailable($this->input('room_id'), $this->input('check_in'), $this->input('check_out'))];
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

    // protected function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         if ($this->input('room_id') && $this->input('check_in') && $this->input('check_out')) {
    //             $rule = new DateRangeAvailable($this->input('room_id'), $this->input('check_in'), $this->input('check_out'));
    //             if (!$rule->validate('', null, function ($message) use ($validator) {
    //                 $validator->errors()->add('check_in', $message);
    //             })) {
    //                 $validator->errors()->add('check_in', 'The selected date range is not available for the selected room.');
    //             }
    //         }
    //     });
    // }
}
