<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    // add show method
    public function show($request, Team $team)
    {
        $team = Team::find($request);
        $members = $team->users()->orderBy('name')->get();
        
        $allUsers = User::get()->diff($members);
        // dd($members, $allUsers);
        return Inertia::render('Teams/Members', [
            'team'      => $team,
            'members'   => $members,
            'users'     => $allUsers,
        ]);
    }
    
    // add store method
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assigned'   => 'required|array',
        ]);

        $team = Team::find($request->team_id);

        // TODO: should check the assigned it's not already attached to the team
        $team->users()->attach($validated['assigned']);
 
        return redirect('teams/'.$request->team_id.'/members');
    }

    // add destroy method
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'team_id' => 'required|unique:teams|string|max:255',
            'users'   => 'required|array',
        ]);
 
        Team::find($validated['team_id'])->removeUsers($validated['users']);
 
        return redirect(route('teams.index'));
    }

}
