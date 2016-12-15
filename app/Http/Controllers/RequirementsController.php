<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Requirements;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    function show($id)
    {
        $requirements = Requirements::where('project_id', $id)->paginate(5);
        $project = Projects::find($id);
        return view('requirements.index', compact('requirements', 'project'));
    }

    function add_requirements(Request $request)
    {
        $project_id = $request->input('project_id');
        $project = Projects::find($project_id);
        return view('requirements.create', compact('project'));
    }

    function store(Request $request)
    {
        $project_id = $request->input('project_id');
        $input = $request->all();
        Requirements::create($input);
        return redirect('/projects/requirements/'.$project_id);
    }

    function edit($id)
    {
        $requirements = Requirements::find($id);
        $project = Projects::find($requirements->project_id);

        return view('requirements.edit', compact('requirements', 'project'));
    }

    function update(Request $request, $id)
    {
        $requirements = Requirements::find($id);
        $input = $request->all();
        $requirements->update($input);
        return redirect('/projects/requirements/'.$requirements->project_id);
    }

    function destroy($id)
    {
        $requirements = Requirements::find($id);
        $requirements->delete();
        return redirect('/projects/requirements/'.$requirements->project_id);
    }

}
