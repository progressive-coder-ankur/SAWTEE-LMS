<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewIssueNotification extends Notification
{
    use Queueable;

    public $bookIssued;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bookIssued)
    {

        $this->bookIssued = $bookIssued;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->bookIssued->issued_by,
            'issued_to' => $this->bookIssued->issued_to,
            'bookName' => $this->bookIssued->book_name,
            'message' => 'Book Issued',
        ];
    }
}
