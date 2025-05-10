<div class="space-y-6">
    <!-- License Number -->
    <div>
        <x-input-label for="license_number"
                       :value="__('Numero de licencia')"
                       class="text-gray-700 dark:text-gray-300"/>
        <x-text-input
            id="license_number"
            name="license_number"
            type="text"
            class="mt-1 block w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
            :value="old('license_number', $license?->license_number)"
            autocomplete="license_number"
            placeholder="Numero de licencia"
        />
        <x-input-error class="mt-2"
                       :messages="$errors->get('license_number')" />
    </div>

    <!-- Issued Date -->
    <div>
        <x-input-label for="issued_date"
                       :value="__('Fecha de expedicion')"
                       class="text-gray-700 dark:text-gray-300"/>
        <x-text-input
            id="issued_date"
            name="issued_date"
            type="date"
            class="mt-1 block w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
            :value="old('issued_date', optional($license)->getRawOriginal('issued_date'))"
            autocomplete="issued_date"
        />
        <x-input-error class="mt-2"
                       :messages="$errors->get('issued_date')" />
    </div>

    <!-- Expiry Date -->
    <div>
        <x-input-label for="expiry_date"
                       :value="__('Fecha de vencimiento')"
                       class="text-gray-700 dark:text-gray-300"/>
        <x-text-input
            id="expiry_date"
            name="expiry_date"
            type="date"
            class="mt-1 block w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
            :value="old('expiry_date', optional($license)->getRawOriginal('expiry_date'))"
            autocomplete="expiry_date"
        />
        <x-input-error class="mt-2"
                       :messages="$errors->get('expiry_date')" />
    </div>

    <!-- Type Of License -->
    <div>
        <x-input-label for="type_of_license"
                       :value="__('Tipo de licencia')"
                       class="text-gray-700 dark:text-gray-300"/>
        <x-text-input
            id="type_of_license"
            name="type_of_license"
            type="text"
            class="mt-1 block w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
            :value="old('type_of_license', $license?->type_of_license)"
            autocomplete="type_of_license"
            placeholder="Tipo de licencia"
        />
        <x-input-error class="mt-2"
                       :messages="$errors->get('type_of_license')" />
    </div>

    <!-- Submit Button -->
    <div class="flex items-center gap-4">
        <x-primary-button class="bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400">
            {{ __('Enviar') }}
        </x-primary-button>
    </div>
</div>
