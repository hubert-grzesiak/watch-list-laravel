<?php

namespace App\Mail;

use App\Models\Show;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEpisodeAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $show;
    public $user;

    public function __construct(Show $show, User $user)
    {
        $this->show = $show;
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('watchlist@example.com', 'Hubert Grzesiak')
            ->subject('New Episode Alert')
            ->view('emails.new_episode_alert')
            ->with([
                'showTitle' => $this->show->title,
//                'numberOfEpisodes' => $this->show->numberOfEpisodes,
                'userName' => $this->user->name,
                'image' => $this->show->image,
            ]);
    }
}
