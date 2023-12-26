<?php
namespace App\Http\Livewire\Shows;

use App\Models\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class ShowModalInfo extends ModalComponent
{
public $showId;

    public function mount($id)
    {
        $this->showId = $id;
        $this->isInWatchlist = DB::table('user_show_progress')
            ->where('user_id', Auth::id())
            ->where('show_id', $id)
            ->exists();
    }


public function render()
{
$show = Show::find($this->showId);
return view('livewire.shows.show-modal-info', compact('show'));
}
}
