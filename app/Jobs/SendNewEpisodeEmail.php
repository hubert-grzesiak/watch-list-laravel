<?php
namespace App\Jobs;

use App\Models\Show;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEpisodeAlert;

class SendNewEpisodeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    public function handle()
    {
        $users = $this->show->users;

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new NewEpisodeAlert($this->show, $user));
        }
    }
}
