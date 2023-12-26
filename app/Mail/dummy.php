<?php

namespace App\Mail;

use App\Models\Show;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class dummy extends Mailable
{
    use Queueable, SerializesModels;

    public $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    public function build()
    {
        return $this->view('emails.new_episode_alert')
            ->with([
                'showTitle' => $this->show->title,
                'numberOfEpisodes' => $this->show->numberOfEpisodes,
            ]);
    }
}
