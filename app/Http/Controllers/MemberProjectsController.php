<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberProjectsController extends Controller
{
    // add show method
    public function show($request, Project $project)
    {
        $project = Project::find($request);

        $members = $project->users()->get();

        $allUsers = User::get()->diff($members);

        return Inertia::render('Projects/Members', [
            'project'   => $project, 
            'members'   => $members,
            'users'     => $allUsers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assigned'   => 'required|array',
        ]);

        $project = Project::find($request->project_id);

        // TODO: should check the assigned it's not already attached to the project
        $project->users()->attach($validated['assigned']);
 
        return redirect('projects/'.$request->project_id.'/members');
    }
}
