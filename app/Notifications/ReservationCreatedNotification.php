<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationCreatedNotification extends Notification
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
                    ->subject('New Reservation Created')
                    ->line('A new reservation has been made by ' . $this->reservation->tourist->name . '.')
                    ->line('Tour Type: ' . $this->reservation->tour_type)
                    ->line('Check In: ' . Carbon::parse($this->reservation->check_in)->format('F j, Y'))
                    ->line('Check Out: ' . Carbon::parse($this->reservation->check_out)->format('F j, Y'))
                    ->line('Status: ' . $this->reservation->status)
                    ->action('View Reservations', url('/user/reservations'));
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
            'check_in' => Carbon::parse($this->reservation->check_in)->format('F j, Y'),
            'check_out' => Carbon::parse($this->reservation->check_out)->format('F j, Y'),
            'status' => $this->reservation->status,
        ];
    }
}
