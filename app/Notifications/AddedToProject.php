<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddedToProject extends Notification
{
    use Queueable;

    protected $project,$tester;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project,$tester)
    {
        $this->project = $project;
        $this->tester = $tester;

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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
//        dd($notifiable);
        return [
            'project'=>$this->project,
            'tester'=>$this->tester,
            'user'=>auth()->user()
        ];
    }
}
