<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $projects = Projects::all();
        return view('projects.index', compact('projects'));
    }

    function create()
    {
        return view('projects.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        Projects::create($input);
        return redirect('/projects');
    }

    function show($id)
    {
        $project = Projects::find($id);
        return view('projects.show', compact('project'));
    }

    function edit($id)
    {
        $project = Projects::find($id);
        return view('projects.edit', compact('project'));
    }

    function update(Request $request, $id)
    {
        $project = Projects::find($id);
        $input = $request->all();
        $project->update($input);
        return redirect('/projects');
    }

}
