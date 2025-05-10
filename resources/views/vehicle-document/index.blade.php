<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Documentos del Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">
                                {{ __('Documentos del Vehículo') }}
                            </h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                Lista de todos los documentos registrados para los vehículos.
                            </p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('vehicle-documents.create') }}"
                               class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Añadir nuevo
                            </a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Nº
                                            </th>
                                            <th scope="col" class="py-3 px-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Tipo de Documento
                                            </th>
                                            <th scope="col" class="py-3 px-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Fecha de Expedición
                                            </th>
                                            <th scope="col" class="py-3 px-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Fecha de Vencimiento
                                            </th>
                                            <th scope="col" class="py-3 px-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Entidad Emisora
                                            </th>
                                            <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-300">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-900">
                                        @foreach ($vehicleDocuments as $vehicleDocument)
                                            <tr class="even:bg-gray-50 dark:even:bg-gray-800">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                                    {{ ++$i }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ $vehicleDocument->documentType->name ?? 'N/A' }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ $vehicleDocument->expedition_date }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ $vehicleDocument->expiration_date }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                                    {{ $vehicleDocument->issuing_entity }}
                                                </td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                                    <form action="{{ route('vehicle-documents.destroy', $vehicleDocument->id) }}" method="POST">
                                                        <a href="{{ route('vehicle-documents.show', $vehicleDocument->id) }}" class="text-gray-600 dark:text-gray-400 font-bold hover:text-gray-900 dark:hover:text-white mr-2">Ver</a>
                                                        {{-- <a href="{{ route('vehicle-documents.edit', $vehicleDocument->id) }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:text-indigo-900 dark:hover:text-white mr-2">Editar</a>--}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('vehicle-documents.destroy', $vehicleDocument->id) }}" class="text-red-600 dark:text-red-400 font-bold hover:text-red-900 dark:hover:text-white"
                                                           onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar este documento?') ? this.closest('form').submit() : false;">
                                                            Eliminar
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4 dark:text-gray-300">
                                    {!! $vehicleDocuments->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
