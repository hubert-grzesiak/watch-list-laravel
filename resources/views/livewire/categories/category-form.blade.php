<div class="px-10 py-5">
    <form wire:submit.prevent="save">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('categories.labels.edit_form_title') }}
            @else
                {{ __('categories.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('categories.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="category.name" />
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('categories.index') }}" secondary class="mr-2 bg-accent text-primary" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner class="bg-accent text-primary" />
        </div>
    </form>
</div>
