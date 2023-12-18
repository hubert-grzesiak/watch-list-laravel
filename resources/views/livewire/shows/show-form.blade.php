<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('shows.labels.edit_form_title') }}
            @else
                {{ __('shows.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="title">{{ __('shows.attributes.title') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="show.title" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="description">{{ __('shows.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-textarea placeholder="{{ __('translation.enter') }}" wire:model="show.description" />
            </div>
        </div>

        <!-- Removed price and manufacturer fields as they were not part of the show validation rules -->

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="year">{{ __('shows.attributes.year') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="show.year" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="rating">{{ __('shows.attributes.rating') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="show.rating" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="number_of_episodes">{{ __('shows.attributes.numberOfEpisodes') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="show.numberOfEpisodes" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="type">{{ __('shows.attributes.type') }}</label>
            </div>
            <div class="">
                <x-wireui-select placeholder="{{ __('translation.select') }}"
                                 wire:model="show.type"
                                 option-label="label"
                                 option-value="value"
                                 :options="[
                     ['value' => 'movie', 'label' => __('shows.types.movie')],
                     ['value' => 'series', 'label' => __('shows.types.series')]
                 ]" />


            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="categories">{{ __('shows.attributes.categories') }}</label>
            </div>
            <div class="">
                <x-wireui-select multiselect placeholder="{{ __('translation.select') }}" wire:model="categoriesIds"
                                 :async-data="route('async.categories')" option-label="name" option-value="id" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="platforms">{{ __('shows.attributes.platforms') }}</label>
            </div>
            <div class="">
                <x-wireui-select multiselect placeholder="{{ __('translation.select') }}" wire:model="platformsIds"
                                 :async-data="route('async.platforms')" option-label="name" option-value="id" />
            </div>
        </div>

        <!-- Platforms field was not included in the original form; assuming it's handled elsewhere -->

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="image">{{ __('products.attributes.image') }}</label>
            </div>
            <div class="">
                @if ($imageExists)
                    <div class="relative">
                        <img class="w-full" src="/storage/{{ $imageUrl }}" alt="{{ $show->title }}">
                        <div class="absolute right-2 top-2 h-16">
                            <x-wireui-button.circle outline xs secondary icon="trash"
                                                    wire:click="confirmDeleteImage" />
                        </div>
                    </div>
                @else
                    <x-wireui-input type="file" wire:model="image" />
                @endif
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('shows.index') }}"
                      primary class="mr-2 bg-accent hover:text-secondary" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner  class="bg-accent hover:text-secondary"/>
        </div>
    </form>
</div>


