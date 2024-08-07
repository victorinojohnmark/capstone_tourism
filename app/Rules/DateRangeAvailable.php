<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Reservation;

class DateRangeAvailable implements ValidationRule
{
    protected $room_id;
    protected $check_in;
    protected $check_out;

    public function __construct($room_id, $check_in, $check_out)
    {
        $this->room_id = $room_id;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hasOverlap = Reservation::where('room_id', $this->room_id)
            ->where(function($query) {
                $query->where(function($query) {
                    $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                          ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
                })
                ->orWhere(function($query) {
                    $query->where('check_in', '<=', $this->check_in)
                          ->where('check_out', '>=', $this->check_out);
                });
            })
            ->exists();

        if ($hasOverlap) {
            $fail('The selected date range is not available for the selected room.');
        }
    }
}
