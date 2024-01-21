<?php

namespace App\Http\Controllers;

use App\User;
use App\ClubModerator;
use App\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $clubs = Club::all();
        $users = User::all();
        return view('backend.clubs.add-moderators', compact('clubs', 'users'));
        // $club =  Club::find($id);
        // $club->delete();

        // return redirect('clubs')->with('success', _lang('Information has been deleted'));
    }



    public function store(Request $request)
    {
        $successMessages = [];
        $errorMessages = [];

        foreach ($request->user_id as $key => $user) {
            // Check if the user is already a moderator for the club
            $existingModerator = ClubModerator::where('club_id', $request->club_id)
                ->where('user_id', $user)
                ->first();

            if (!$existingModerator) {
                // If the user is not a moderator, insert them as one
                $clubModerator = new ClubModerator();
                $clubModerator->club_id = $request->club_id;
                $clubModerator->user_id = $user;
                $clubModerator->save();

                $successMessages[] = "User added as a moderator.";
            } else {
                $errorMessages[] = "User is already a moderator.";
            }
        }

        // Redirect back with success and error messages
        $message = 'Information added';
        if (!empty($successMessages)) {
            $message .= ': ' . implode(', ', $successMessages);
        }
        if (!empty($errorMessages)) {
            $message .= ' (error: ' . implode(', ', $errorMessages) . ')';
            return redirect()->back()->with('error', _lang($message));
        }

        return redirect()->back()->with('success', _lang($message));
    }


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(ClubModerator $clubModerator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClubModerator $clubModerator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClubModerator $clubModerator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClubModerator $clubModerator)
    {
        //
    }
}
