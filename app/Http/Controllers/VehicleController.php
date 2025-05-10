<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehicleController extends Controller
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
        // Mostrar solo los vehículos del usuario autenticado
        $vehicles = $request->user()->vehicles()->paginate();

        return view('vehicle.index', compact('vehicles'))
            ->with('i', ($request->input('page', 1) - 1) * $vehicles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehicle = new Vehicle();

        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request): RedirectResponse
    {
        // Asignar automáticamente el user_id
        $request->user()->vehicles()->create($request->validated());

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Verificar que sea del usuario
        $vehicle = auth()->user()->vehicles()->find($id);

        if (!$vehicle) {
            abort(404, 'Vehicle not found or does not belong to you.');
        }

        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehicle = auth()->user()->vehicles()->find($id);

        if (!$vehicle) {
            abort(404, 'Vehicle not found or does not belong to you.');
        }

        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        // Validar que el vehículo pertenezca al usuario
        if ($vehicle->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $vehicle->update($request->validated());

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $vehicle = auth()->user()->vehicles()->find($id);

        if (!$vehicle) {
            abort(404, 'Vehicle not found or does not belong to you.');
        }

        $vehicle->delete();

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
