<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Ver Licencia
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-white">
                                Ver Licencia
                            </h1>
                            <p class="mt-2 text-sm text-gray-300">Detalles de la licencia.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('licenses.index') }}"
                               class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Volver
                            </a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mt-6 border-t border-gray-700">
                                    <dl class="divide-y divide-gray-700">
                                        <!-- Número de licencia -->
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-white">{{ __('Número de Licencia') }}</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ old('license_number', $license?->license_number) }}</dd>
                                        </div>

                                        <!-- Fecha de expedición -->
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-white">{{ __('Fecha de Expedición') }}</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ old('issued_date', optional($license)->getRawOriginal('issued_date')) }}</dd>
                                        </div>

                                        <!-- Fecha de vencimiento -->
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-white">{{ __('Fecha de Vencimiento') }}</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ old('expiry_date', optional($license)->getRawOriginal('expiry_date')) }}</dd>
                                        </div>

                                        <!-- Tipo de licencia -->
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-white">{{ __('Tipo de Licencia') }}</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0">{{ old('type_of_license', $license?->type_of_license) }}</dd>
                                        </div>

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
