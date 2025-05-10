<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ isset($license) ? __('Edit License') : __('Create License') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST"
                      action="{{ isset($license) ? route('licenses.update', $license) : route('licenses.store') }}">
                    @csrf
                    @if(isset($license))
                        @method('PUT')
                    @endif

                    <div class="space-y-6">
                        <!-- License Number -->
                        <div>
                            <x-input-label for="license_number" :value="__('License Number')" class="dark:text-gray-300"/>
                            <x-text-input
                                id="license_number"
                                name="license_number"
                                type="text"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('license_number', $license?->license_number)"
                                autocomplete="license_number"
                                placeholder="License Number"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('license_number')" />
                        </div>

                        <!-- Issued Date -->
                        <div>
                            <x-input-label for="issued_date" :value="__('Issued Date')" class="dark:text-gray-300"/>
                            <x-text-input
                                id="issued_date"
                                name="issued_date"
                                type="date"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('issued_date', optional($license)->getRawOriginal('issued_date'))"
                                autocomplete="issued_date"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('issued_date')" />
                        </div>

                        <!-- Expiry Date -->
                        <div>
                            <x-input-label for="expiry_date" :value="__('Expiry Date')" class="dark:text-gray-300"/>
                            <x-text-input
                                id="expiry_date"
                                name="expiry_date"
                                type="date"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('expiry_date', optional($license)->getRawOriginal('expiry_date'))"
                                autocomplete="expiry_date"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('expiry_date')" />
                        </div>

                        <!-- Type Of License -->
                        <div>
                            <x-input-label for="type_of_license" :value="__('Type Of License')" class="dark:text-gray-300"/>
                            <x-text-input
                                id="type_of_license"
                                name="type_of_license"
                                type="text"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('type_of_license', $license?->type_of_license)"
                                autocomplete="type_of_license"
                                placeholder="Type Of License"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('type_of_license')" />
                        </div>

                        <!-- Submit & Cancel -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ isset($license) ? __('Update') : __('Create') }}
                            </x-primary-button>
                            <a
                                href="{{ route('licenses.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:underline"
                            >
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
