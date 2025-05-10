<?php

namespace App\Http\Controllers;

use App\Models\VehicleDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleDocumentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\DocumentType;
class VehicleDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehicleDocuments = VehicleDocument::paginate();

        return view('vehicle-document.index', compact('vehicleDocuments'))
            ->with('i', ($request->input('page', 1) - 1) * $vehicleDocuments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    $vehicleDocument = new VehicleDocument();
    $documentTypes = DocumentType::all(); // Obtener todos los tipos: SOAT y Tecno

    return view('vehicle-document.create', compact('vehicleDocument', 'documentTypes'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleDocumentRequest $request): RedirectResponse
    {
        VehicleDocument::create($request->validated());

        return Redirect::route('vehicle-documents.index')
            ->with('success', 'VehicleDocument created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehicleDocument = VehicleDocument::find($id);

        return view('vehicle-document.show', compact('vehicleDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
{
    $vehicleDocument = VehicleDocument::find($id);
    $documentTypes = DocumentType::all(); // Obtener todos los tipos de documento

    return view('vehicle-document.edit', compact('vehicleDocument', 'documentTypes'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleDocumentRequest $request, VehicleDocument $vehicleDocument): RedirectResponse
    {
        $vehicleDocument->update($request->validated());

        return Redirect::route('vehicle-documents.index')
            ->with('success', 'VehicleDocument updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VehicleDocument::find($id)->delete();

        return Redirect::route('vehicle-documents.index')
            ->with('success', 'VehicleDocument deleted successfully');
    }
}
