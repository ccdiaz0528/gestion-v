<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LicenseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $licenses = License::paginate();

        return view('license.index', compact('licenses'))
            ->with('i', ($request->input('page', 1) - 1) * $licenses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $license = new License();

        return view('license.create', compact('license'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenseRequest $request): RedirectResponse
    {
        License::create($request->validated());

        return Redirect::route('licenses.index')
            ->with('success', 'License created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $license = License::find($id);

        return view('license.show', compact('license'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $license = License::find($id);

        return view('license.edit', compact('license'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LicenseRequest $request, License $license): RedirectResponse
    {
        $license->update($request->validated());

        return Redirect::route('licenses.index')
            ->with('success', 'License updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        License::find($id)->delete();

        return Redirect::route('licenses.index')
            ->with('success', 'License deleted successfully');
    }
}
