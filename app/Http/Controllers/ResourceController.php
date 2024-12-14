<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Branch;
use App\Models\ResourceType;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with(['branch', 'type'])->get();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        $branches = Branch::all();
        $resourceTypes = ResourceType::all();
        return view('resources.create', compact('branches', 'resourceTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'type_id' => 'required|exists:resource_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'multi_patient' => 'required|boolean',
        ]);

        Resource::create($request->all());
        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }

    public function edit(Resource $resource)
    {
        $branches = Branch::all();
        $resourceTypes = ResourceType::all();
        return view('resources.edit', compact('resource', 'branches', 'resourceTypes'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'type_id' => 'required|exists:resource_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'multi_patient' => 'required|boolean',
        ]);

        $resource->update($request->all());
        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}
