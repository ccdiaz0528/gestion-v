<div class="space-y-6 text-gray-900 dark:text-gray-100">

    {{-- Tipo de documento --}}
    <div>
        <x-input-label for="document_type_id" :value="__('Tipo de documento')" class="dark:text-gray-100"/>
        <select id="document_type_id" name="document_type_id"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">-- Selecciona el tipo de documento --</option>
            @foreach ($documentTypes as $type)
                <option value="{{ $type->id }}" {{ old('document_type_id', $vehicleDocument?->document_type_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('document_type_id')" />
    </div>

    {{-- Fecha de expedición --}}
    <div>
        <x-input-label for="expedition_date" :value="__('Fecha de expedición')" class="dark:text-gray-100"/>
        <input type="date" id="expedition_date" name="expedition_date"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('expedition_date', $vehicleDocument?->expedition_date) }}">
        <x-input-error class="mt-2" :messages="$errors->get('expedition_date')" />
    </div>

    {{-- Fecha de vencimiento --}}
    <div>
        <x-input-label for="expiration_date" :value="__('Fecha de vencimiento')" class="dark:text-gray-100"/>
        <input type="date" id="expiration_date" name="expiration_date"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('expiration_date', $vehicleDocument?->expiration_date) }}">
        <x-input-error class="mt-2" :messages="$errors->get('expiration_date')" />
    </div>

    {{-- Entidad emisora --}}
    <div>
        <x-input-label for="issuing_entity" :value="__('Entidad emisora')" class="dark:text-gray-100"/>
        <x-text-input id="issuing_entity" name="issuing_entity" type="text"
            class="mt-1 block w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            :value="old('issuing_entity', $vehicleDocument?->issuing_entity)"
            autocomplete="issuing_entity"
            placeholder="Entidad emisora"/>
        <x-input-error class="mt-2" :messages="$errors->get('issuing_entity')" />
    </div>

    {{-- Botón --}}
    <div class="flex items-center gap-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 dark:bg-indigo-600 dark:hover:bg-indigo-500">
            {{ __('Guardar') }}
        </x-primary-button>
        <a href="{{ route('vehicle-documents.index') }}"
            class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
            {{ __('Cancelar') }}
        </a>
    </div>
</div>
