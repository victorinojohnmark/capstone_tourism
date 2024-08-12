<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Room;

class GuestCountNotExceedCapacity implements ValidationRule
{
    protected $roomId;

    public function __construct($roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * Validate the guest count.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $room = Room::find($this->roomId);

        if (!$room) {
            $fail('The selected room does not exist.');
            return;
        }

        if ($value > $room->capacity) {
            $fail('The number of guests exceeds the room capacity.');
        }
    }
}
