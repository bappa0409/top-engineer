<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('pages.project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'status'            => 'required|in:draft,published',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'dimensions'        => 'nullable|string|max:255',
            'building_height'   => 'nullable|numeric',
            'weight'            => 'nullable|numeric',
            'purpose'           => 'nullable|string|max:255',
            'documentation'     => 'nullable|string|max:255',
        ]);

        $project = new Project();

        $project->title             = $request->title;
        $project->status            = $request->status;
        $project->description       = $request->description;
        $project->dimensions        = $request->dimensions;
        $project->building_height   = $request->building_height;
        $project->weight            = $request->weight;
        $project->purpose           = $request->purpose;
        $project->documentation     = $request->documentation;

        if ($request->hasFile('image')) {
            $request_file = $request->file('image');
            $extension    = $request_file->extension();
            $filename     = time() . rand(10, 1000) . '.' . $extension;

            $path = 'upload/projects/' . $filename;
            $request_file->move(public_path('upload/projects'), $filename);

            $project->image = $path;
        }
        
        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('pages.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'status'            => 'required|in:draft,published',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'dimensions'        => 'nullable|string|max:255',
            'building_height'   => 'nullable|numeric',
            'weight'            => 'nullable|numeric',
            'purpose'           => 'nullable|string|max:255',
            'documentation'     => 'nullable|string|max:255',
        ]);

        $project = Project::findOrFail($id);

        $project->title             = $request->title;
        $project->status            = $request->status;
        $project->description       = $request->description;
        $project->dimensions        = $request->dimensions;
        $project->building_height   = $request->building_height;
        $project->weight            = $request->weight;
        $project->purpose           = $request->purpose;
        $project->documentation     = $request->documentation;

        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $request_file = $request->file('image');
            $extension    = $request_file->extension();
            $filename     = time() . rand(10, 1000) . '.' . $extension;

            $path = 'upload/projects/' . $filename;
            $request_file->move(public_path('upload/projects'), $filename);

            $project->image = $path;
        }

        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Project deleted successfully!',
        ]);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);

        $ids = explode(',', $request->ids);
        $projects = Project::whereIn('id', $ids)->get();

        if ($projects->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No projects found.'
            ], 404);
        }

        foreach ($projects as $project) {
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }
            $project->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Selected projects deleted successfully!'
        ]);
    }

    /**
     * visibility Change.
     * @return Renderable
     */
    public function visibilityChange(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if ($project->status == 'published') {
            $project->update(['status' => 'draft']);
        }elseif ($project->status == 'draft') {
            $project->update(['status' => 'published']);
        }
        return response()->json(['success' => 'success', 'message' => 'Project status changed successfully']);
    }
}
