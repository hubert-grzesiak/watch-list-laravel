<?php

namespace App\Http\Livewire\Platforms;

use App\Models\Platform;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlatformForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Platform $platform;
    public Bool $editMode;

    public function rules()
    {
        return [
            'platform.name' => [
                'required',
                'string',
                'min:2',
                'unique:platforms,name' .
                ($this->editMode
                    ? (',' . $this->platform->id)
                    : ''
                ),
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(
                __('platforms.attributes.name')
            ),
        ];
    }

    public function mount(Platform $platform, Bool $editMode)
    {
        $this->platform = $platform;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.platforms.platform-form');
    }

    /**
     * Walidacja na żywo
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        sleep(1);   // tymczasowo, celem pokazania opóźnienia
        if ($this->editMode) {
            $this->authorize('update', $this->platform);
        } else {
            $this->authorize('create', Platform::class);
        }
        $this->validate();
        $this->platform->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('platforms.messages.successes.updated', ['name' => $this->platform->name])
                : __('platforms.messages.successes.stored', ['name' => $this->platform->name])
        );
        $this->editMode = true;
        // opcjonalne przekierowanie na inny adres URL
         return redirect()->route('platforms.index');
    }
}
