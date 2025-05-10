<div class="space-y-6 text-white">

    <div>
        <x-input-label for="brand" :value="__('Marca')" />
        <x-text-input
            id="brand"
            name="brand"
            type="text"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white"
            :value="old('brand', $vehicle?->brand)"
            autocomplete="brand"
            placeholder="Marca del vehículo"
        />
        <x-input-error class="mt-2" :messages="$errors->get('brand')" />
    </div>

    <div>
        <x-input-label for="plate" :value="__('Placa')" />
        <x-text-input
            id="plate"
            name="plate"
            type="text"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white"
            :value="old('plate', $vehicle?->plate)"
            autocomplete="plate"
            placeholder="Placa del vehículo"
        />
        <x-input-error class="mt-2" :messages="$errors->get('plate')" />
    </div>

    <div>
        <x-input-label for="model" :value="__('Modelo')" />
        <x-text-input
            id="model"
            name="model"
            type="text"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white"
            :value="old('model', $vehicle?->model)"
            autocomplete="model"
            placeholder="Modelo del vehículo"
        />
        <x-input-error class="mt-2" :messages="$errors->get('model')" />
    </div>

    <div>
        <x-input-label for="color" :value="__('Color')" />
        <x-text-input
            id="color"
            name="color"
            type="text"
            class="mt-1 block w-full bg-gray-700 border-gray-600 text-white"
            :value="old('color', $vehicle?->color)"
            autocomplete="color"
            placeholder="Color del vehículo"
        />
        <x-input-error class="mt-2" :messages="$errors->get('color')" />
    </div>

    

</div>
