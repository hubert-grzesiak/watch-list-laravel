<?php
namespace App\Http\Livewire\Shows;

use App\Models\Show;
use LivewireUI\Modal\ModalComponent;

class ShowModalInfo extends ModalComponent
{
public $showId;

public function mount($id)
{
$this->showId = $id;
}

public function render()
{
// Load the show details from the database
$show = Show::find($this->showId);
// Pass the show to the view
return view('livewire.shows.show-modal-info', compact('show'));
}
}
