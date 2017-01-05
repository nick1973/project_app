<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Requirements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequirementsController extends Controller
{
    function show($id)
    {
        $requirements = Requirements::where('project_id', $id)->orderBy('id', 'desc')->paginate(5);//->where('passed', 'No')
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
        return $input;
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
        if($request->input('passed')=='1'){
            Mail::send('emails.success', ['requirements'=>$requirements], function ($m) {
                $m->from('system@project-planner.online', 'CTM Application');
                $m->to(['nick.ashford@ctm.uk.com', 'trevor.chappel@ctm.uk.com'])->subject('Project Planner Update');
            });
        }
        if($request->input('development')=='1'){
            Mail::send('emails.developed', ['requirements'=>$requirements], function ($m) {
                $m->from('system@project-planner.online', 'CTM Application');
                $m->to(['nick.ashford@ctm.uk.com', 'trevor.chappel@ctm.uk.com'])->subject('Project Planner Update');
            });
        }
        return redirect('/projects/requirements/'.$requirements->project_id);
    }

    function destroy($id)
    {
        $requirements = Requirements::find($id);
        $requirements->delete();
        return redirect('/projects/requirements/'.$requirements->project_id);
    }

}
