<?php

namespace App\Http\Livewire\Shows;

use App\Models\Category;
use App\Models\Platform;
use App\Models\Show;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;

    public $show;
    public $categoriesIds;
    public $platformsIds;

    public $image;

    // atrybuty pomocnicze nie bindowane bezpośrednio w formularzu
    public $imageUrl;
    public $imageExists;
    public $editMode;

    public function rules()
    {
        return [
            'show.title' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'show.description' => [
                'required',
                'nullable',
                'string',
                'max:190'
            ],
            'show.year' => [
                'required',
                'string',
            ],
            'show.image' => [
                'nullable',
                'max:1024',
            ],
            'show.rating' => [
                'required',
                'min:0',
                'max:10',
            ],
            'show.numberOfEpisodes' => [
                'required',
                'integer',
                'min:1',
            ],
            "show.type" => [
                'required',
                'string',
            ],
            'categoriesIds' => ['required','array','max:3'],
            'platformsIds' => ['required','array','max:3'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'show.title' => Str::lower(__('shows.attributes.title')),
            'show.description' => Str::lower(__('shows.attributes.description')),
            'show.year' => Str::lower(__('shows.attributes.year')),
            'show.image' => Str::lower(__('shows.attributes.image')),
            'show.rating' => Str::lower(__('shows.attributes.rating')),
            'show.numberOfEpisodes' => Str::lower(__('shows.attributes.numberOfEpisodes')),
            'show.type' => Str::lower(__('shows.attributes.type')),
            'categoriesIds' => Str::lower(__('shows.attributes.categories')),
            'platformsIds' => Str::lower(__('shows.attributes.platforms')),
        ];
    }

    public function mount(Show $show, Bool $editMode)
    {
        $this->show = $show;
//        $this->categoriesIds = $this->show->categories->toArray();
        $this->categoriesIds = $this->show->categories->toArray();
        $this->platformsIds = $this->show->platforms->toArray();
        $this->imageChange();
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.shows.show-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Zapisanie produktu
     *
     * @return void
     */
    public function save()
    {
        // autoryzacja poprzez policy
        if ($this->editMode) {
            $this->authorize('update', $this->show);
        } else {
            $this->authorize('create', Show::class);
        }

        $this->validate();

        $show = $this->show;
        $categoriesIds = $this->categoriesIds;
        $platformsIds = $this->platformsIds;

        $image = $this->image;

        DB::transaction(function () use ($show, $categoriesIds, $platformsIds, $image) {
            $show->save();
            if ($image !== null) {
                $show->image = $show->id
                    . '.' . $this->image->getClientOriginalExtension();
                $show->save();
            }
            $show->categories()->sync($categoriesIds);
            $show->platforms()->sync($platformsIds);
        });

        if ($this->image !== null) {
            $this->image->storeAs(
                '',
                $this->show->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('shows.messages.successes.updated', ['title' => $this->show->title])
                : __('shows.messages.successes.stored', ['title' => $this->show->title])
        );
        $this->editMode = true;
        $this->imageChange();
        $this->redirect('/shows');
    }

    /**
     * Potwierdzenie usunięcia zdjęcia
     *
     * @return void
     */
    public function confirmDeleteImage()
    {
        $this->dialog()->confirm([
            'title' => __('shows.dialogs.image_delete.title'),
            'description' => __('shows.dialogs.image_delete.description', [
                'title' => $this->show->title
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'deleteImage',
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    /**
     * Usunięcie zdjęcia
     *
     * @return void
     */
    public function deleteImage()
    {
        if (Storage::disk('public')->delete($this->show->image)) {
            $this->show->image = null;
            $this->show->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('translation.messages.successes.destroyed_title'),
                $description = __('shows.messages.successes.image_deleted', [
                    'title' => $this->show->title
                ])
            );
            return;
        }
        $this->notification()->error(
            $title = __('translation.messages.errors.destroy_title'),
            $description = __('shows.messages.errors.image_deleted', [
                'title' => $this->show->title
            ])
        );
    }

    protected function imageChange()
    {
        $this->imageExists = $this->show->imageExists();
        $this->imageUrl = $this->show->image;
    }
}

