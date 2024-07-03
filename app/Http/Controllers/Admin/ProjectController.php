<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsArray = Project::paginate(5);
        return view('admin.projects.index', compact('projectsArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view("admin.projects.create", compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();
        $project->fill($data);
        $project->slug = Str::slug($request->title);
        $project->save();
       

        //aggiungo i tech selezionati 
        if($request->has('technologies')){
            $project->technologies()->attach($request->technologies); // mi mostra le tecnologie che prende dalla tabella teconolgie
        }

        return redirect()->route('admin.projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();     
        $project->update($data);
        $project->technologies()->sync($request->technologies);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      $project->delete();
      return redirect()->route('admin.projects.index')->with('message', 'projects' . $project->title . ' è stato eliminato');  
    }
}
