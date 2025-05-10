<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LicenseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\LicenseType;
class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Mostrar solo las licencias del usuario autenticado
        $licenses = $request->user()->licenses()->paginate();

        return view('license.index', compact('licenses'))
            ->with('i', ($request->input('page', 1) - 1) * $licenses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    $license = new License();
    $licenseTypes = LicenseType::all(); // Asegúrate de tener este modelo definido
    return view('license.create', compact('license', 'licenseTypes')); // Incluye $license
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenseRequest $request): RedirectResponse
    {
        // Asignar automáticamente el user_id del usuario autenticado
        $request->user()->licenses()->create($request->validated());

        return Redirect::route('licenses.index')
            ->with('success', 'License created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Verificar que la licencia exista y pertenezca al usuario
        $license = auth()->user()->licenses()->find($id);

        if (!$license) {
            abort(404, 'License not found or does not belong to you.');
        }

        return view('license.show', compact('license'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
{
    $license = auth()->user()->licenses()->findOrFail($id);
    $licenseTypes = LicenseType::all(); // Carga todos los tipos de licencia
    return view('license.edit', compact('license', 'licenseTypes')); // Incluye $licenseTypes
}

    /**
     * Update the specified resource in storage.
     */
    public function update(LicenseRequest $request, License $license): RedirectResponse
    {
        // Validar que la licencia pertenezca al usuario autenticado
        if ($license->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $license->update($request->validated());

        return Redirect::route('licenses.index')
            ->with('success', 'License updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $license = auth()->user()->licenses()->find($id);

        if (!$license) {
            abort(404, 'License not found or does not belong to you.');
        }

        $license->delete();

        return Redirect::route('licenses.index')
            ->with('success', 'License deleted successfully');
    }
}
