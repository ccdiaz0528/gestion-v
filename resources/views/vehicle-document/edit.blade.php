<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Actualizar Documento del Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    {{-- Encabezado del módulo --}}
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">
                                Actualizar Documento del Vehículo
                            </h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                Actualiza los datos del documento del vehículo existente.
                            </p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('vehicle-documents.index') }}"
                                class="inline-flex items-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 text-white dark:text-gray-100 text-sm font-semibold shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Volver
                            </a>
                        </div>
                    </div>

                    {{-- Formulario --}}
                    <div class="flow-root mt-6 overflow-x-auto">
                        <div class="max-w-xl py-2 align-middle">
                            <form method="POST" action="{{ route('vehicle-documents.update', $vehicleDocument->id) }}" role="form" enctype="multipart/form-data" class="space-y-6">
                                @method('PATCH')
                                @csrf

                                {{-- Incluir el formulario parcial adaptado para modo oscuro --}}
                                @include('vehicle-document.form')
                            </form>
                        </div>
                    </div>
                    {{-- /Formulario --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
