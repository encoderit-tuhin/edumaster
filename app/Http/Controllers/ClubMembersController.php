<?php

namespace App\Http\Controllers;

use App\User;
use App\ClubMembers;
use App\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        //
        $clubs = Club::all();
        $users = User::all();
        return view('backend.clubs.add-members', compact('clubs', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $successMessages = [];
        $errorMessages = [];

        foreach ($request->user_id as $key => $user) {
            // Check if the user is already a member for the club
            $existingMembers = ClubMembers::where('club_id', $request->club_id)
                ->where('user_id', $user)
                ->first();

            if (!$existingMembers) {
                // If the user is not a member, insert them as one
                $clubMember = new ClubMembers();
                $clubMember->club_id = $request->club_id;
                $clubMember->user_id = $user;
                $clubMember->save();

                $successMessages[] = "User added as a member.";
            } else {
                $errorMessages[] = "User is already a member.";
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
     * Display the specified resource.
     */
    public function show(ClubMembers $clubMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClubMembers $clubMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClubMembers $clubMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClubMembers $clubMembers)
    {
        //
    }
}
