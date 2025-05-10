<div class="space-y-6">
    
    <div>
        <x-input-label for="brand" :value="__('Brand')"/>
        <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand', $vehicle?->brand)" autocomplete="brand" placeholder="Brand"/>
        <x-input-error class="mt-2" :messages="$errors->get('brand')"/>
    </div>
    <div>
        <x-input-label for="number_plate" :value="__('Number Plate')"/>
        <x-text-input id="number_plate" name="number_plate" type="text" class="mt-1 block w-full" :value="old('number_plate', $vehicle?->number_plate)" autocomplete="number_plate" placeholder="Number Plate"/>
        <x-input-error class="mt-2" :messages="$errors->get('number_plate')"/>
    </div>
    <div>
        <x-input-label for="model" :value="__('Model')"/>
        <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $vehicle?->model)" autocomplete="model" placeholder="Model"/>
        <x-input-error class="mt-2" :messages="$errors->get('model')"/>
    </div>
    <div>
        <x-input-label for="color" :value="__('Color')"/>
        <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $vehicle?->color)" autocomplete="color" placeholder="Color"/>
        <x-input-error class="mt-2" :messages="$errors->get('color')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>