<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Licenses') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                {{-- Header del módulo --}}
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">
                            Licencias
                        </h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                            Lista de licencias.
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('licenses.create') }}"
                           class="inline-flex items-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 text-white dark:text-gray-100 text-sm font-semibold shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                            {{ __('Agregar') }}
                        </a>
                    </div>
                </div>

                {{-- Tabla de licencias --}}
                <div class="flow-root mt-6 overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">#</th>
                                    <th class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Número de licencia</th>
                                    <th class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Fecha de expedición</th>
                                    <th class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Fecha de vencimiento</th>
                                    <th class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Tipo de licencia</th>
                                    <th class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach ($licenses as $license)
                                    <tr class="even:bg-white dark:even:bg-gray-800 odd:bg-gray-50 dark:odd:bg-gray-700">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $loop->iteration + ($licenses->currentPage()-1)*$licenses->perPage() }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $license->license_number }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $license->issued_date }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $license->expiry_date }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $license->type_of_license }}
                                        </td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                            <form action="{{ route('licenses.destroy', $license) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('licenses.show', $license) }}"
                                                   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 mr-2">
                                                    {{ __('Show') }}
                                                </a>
                                                <a href="{{ route('licenses.edit', $license) }}"
                                                   class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-200 mr-2">
                                                    {{ __('Edit') }}
                                                </a>
                                                <button type="submit"
                                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-200"
                                                        onclick="return confirm('{{ __('¿Seguro que quieres eliminar esta licencia?') }}')">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Paginación --}}
                        <div class="mt-4 px-4">
                            {!! $licenses->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
                {{-- /Tabla --}}
            </div>
        </div>
    </div>
</x-app-layout>
