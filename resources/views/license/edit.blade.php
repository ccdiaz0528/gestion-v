<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Update') }} License
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    {{-- Header del módulo --}}
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">
                                {{ __('Update') }} License
                            </h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                Update existing {{ __('License') }}.
                            </p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('licenses.index') }}"
                               class="inline-flex items-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 text-white dark:text-gray-100 text-sm font-semibold shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    {{-- Formulario --}}
                    <div class="flow-root mt-6 overflow-x-auto">
                        <div class="max-w-xl py-2 align-middle">
                            <form method="POST"
                                  action="{{ route('licenses.update', $license) }}"
                                  role="form"
                                  enctype="multipart/form-data"
                                  class="space-y-6">
                                @method('PATCH')
                                @csrf

                                {{-- Partial adaptado para Dark Mode --}}
                                <div class="space-y-6">
                                    <!-- Numero de licencia -->
                                    <div>
                                        <x-input-label for="license_number"
                                                       :value="__('Numero de licencia')"
                                                       class="text-gray-700 dark:text-gray-300"/>
                                        <x-text-input
                                            id="license_number"
                                            name="license_number"
                                            type="text"
                                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                            :value="old('license_number', $license->license_number)"
                                            autocomplete="license_number"
                                            placeholder="Numero de licencia"
                                        />
                                        <x-input-error class="mt-2"
                                                       :messages="$errors->get('license_number')" />
                                    </div>

                                    <!-- Fecha de expedición -->
                                    <div>
                                        <x-input-label for="issued_date"
                                                       :value="__('Fecha de expedicion')"
                                                       class="text-gray-700 dark:text-gray-300"/>
                                        <x-text-input
                                            id="issued_date"
                                            name="issued_date"
                                            type="date"
                                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                            :value="old('issued_date', optional($license)->getRawOriginal('issued_date'))"
                                            autocomplete="issued_date"
                                        />
                                        <x-input-error class="mt-2"
                                                       :messages="$errors->get('issued_date')" />
                                    </div>

                                    <!-- Fecha de vencimiento -->
                                    <div>
                                        <x-input-label for="expiry_date"
                                                       :value="__('Fecha de vencimiento')"
                                                       class="text-gray-700 dark:text-gray-300"/>
                                        <x-text-input
                                            id="expiry_date"
                                            name="expiry_date"
                                            type="date"
                                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                            :value="old('expiry_date', optional($license)->getRawOriginal('expiry_date'))"
                                            autocomplete="expiry_date"
                                        />
                                        <x-input-error class="mt-2"
                                                       :messages="$errors->get('expiry_date')" />
                                    </div>

                                    <!-- Tipo de licencia -->
                                    <div>
                                        <x-input-label for="type_of_license"
                                                       :value="__('Tipo de licencia')"
                                                       class="text-gray-700 dark:text-gray-300"/>
                                        <x-text-input
                                            id="type_of_license"
                                            name="type_of_license"
                                            type="text"
                                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
                                            :value="old('type_of_license', $license->type_of_license)"
                                            autocomplete="type_of_license"
                                            placeholder="Tipo de licencia"
                                        />
                                        <x-input-error class="mt-2"
                                                       :messages="$errors->get('type_of_license')" />
                                    </div>

                                    <!-- Botón Actualizar -->
                                    <div class="flex items-center gap-4">
                                        <x-primary-button
                                            class="bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400">
                                            {{ __('Update') }}
                                        </x-primary-button>
                                        <a href="{{ route('licenses.index') }}"
                                           class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                                            {{ __('Cancel') }}
                                        </a>
                                    </div>
                                </div>
                                {{-- /Partial --}}
                            </form>
                        </div>
                    </div>
                    {{-- /Formulario --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
