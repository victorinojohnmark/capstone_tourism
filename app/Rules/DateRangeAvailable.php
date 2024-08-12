<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class DateRangeAvailable implements ValidationRule
{
    protected $roomId;
    protected $checkIn;
    protected $checkOut;
    protected $tourType;

    public function __construct($roomId, $checkIn, $checkOut, $tourType)
    {
        $this->roomId = $roomId;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->tourType = $tourType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // dd($this->checkIn, $this->checkOut);

        // Query to check for overlapping reservations based on the datetime range
        $hasOverlap = Reservation::where('room_id', $this->roomId)
            ->where(function ($query) {
                $query->where(function ($query) {
                    // Overlapping scenarios:
                    $query->whereBetween('check_in', [$this->checkIn, $this->checkOut])
                          ->orWhereBetween('check_out', [$this->checkIn, $this->checkOut])
                          ->orWhere(function ($query) {
                              // Check for an existing reservation that fully encompasses the new one
                              $query->where('check_in', '<=', $this->checkIn)
                                    ->where('check_out', '>=', $this->checkOut);
                          });
                });
            })
            ->exists();

        if ($hasOverlap) {
            $fail('The selected date range is not available for the chosen room.');
        }
    }
}
