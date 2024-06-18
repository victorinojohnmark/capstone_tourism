<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use App\Models\Reservation;

class ReservationApprovedNotification extends Notification
{
    use Queueable;


    public $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Reservation Accepted')
                    ->line('Your reservation has been accepted by ' . $this->reservation->vendor->name . '.')
                    ->line('Tour Type: ' . $this->reservation->tour_type)
                    ->line('Check In: ' . Carbon::parse($this->reservation->check_in)->format('F j, Y'))
                    ->line('Check Out: ' . Carbon::parse($this->reservation->check_out)->format('F j, Y'))
                    ->action('View Reservation', url('/user/reservations'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'reservation_id' => $this->reservation->id,
            'tourist_name' => $this->reservation->tourist->name,
            'tour_type' => $this->reservation->tour_type,
            'check_in' => $this->reservation->check_in,
            'check_out' => $this->reservation->check_out,
            'status' => 'Approved',
        ];
    }
}
