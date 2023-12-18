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
}

public function addToWatchlist()
{
if (!Auth::check()) {
$this->emit('alert', 'You need to be logged in.');
return;
}

$userId = Auth::id();

// Check if the show is already in the watchlist
$exists = DB::table('user_show_progress')
->where('user_id', $userId)
->where('show_id', $this->showId)
->exists();

if ($exists) {
// Remove from watchlist
DB::table('user_show_progress')
->where('user_id', $userId)
->where('show_id', $this->showId)
->delete();

$this->emit('alert', 'Show removed from your watchlist.');
} else {
// Add to watchlist
DB::table('user_show_progress')->insert([
'user_id' => $userId,
'show_id' => $this->showId,
'watched' => false,
'current_episode' => 0,
'created_at' => now(),
'updated_at' => now(),
]);

$this->emit('alert', 'Show added to your watchlist.');
}
}

public function render()
{
$show = Show::find($this->showId);
return view('livewire.shows.show-modal-info', compact('show'));
}
}
