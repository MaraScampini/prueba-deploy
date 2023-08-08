<?php

namespace App\Http\Controllers;

//necesary facades - class

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Team;

class TeamController extends Controller
{

    //GET USER TEAMS
    public function getUserTeams(Request $request)
    {try {
        $user = $request->user(); // Get the authenticated user from the token
        // Get the teams the user belongs to
        $teams = $user->teams()->with('users')->get();
        // Check if the user belongs to any team
        if ($teams->isEmpty()) {
            return response()->json(['message' => 'El usuario no pertenece a ningún equipo.']);
        }

        return response()->json([
            'message' => 'Teams found',
            'data' => $teams,
        ], Response::HTTP_OK); // 200 state


    } catch (\Throwable $th) {
        Log::error('Error retrieving user teams: ' . $th->getMessage());
        return response()->json([
            'message' => 'Error retrieving user teams'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
    }}

    //ALL TEAMS
    public function getAllTeams()
    {
        try {
            $teams = Team::with('users')->get();

            return response()->json([
                'message' => 'Teams found',
                'data' => $teams,
            ], Response::HTTP_OK); // 200 state

        } catch (\Throwable $th) {
            Log::error('Error retrieving teams ' . $th->getMessage());
            return response()->json([
                'message' => 'Error retrieving teams'
            ], Response::HTTP_INTERNAL_SERVER_ERROR); //500 state
        }
    }

    //NEW TEAM

    public function createTeam(Request $request)
    {
        try {
            $teamData = $request->only('name');
            $members = $request->input('members', []); // 'members' should be an array of user IDs

            // Begin a transaction to ensure data integrity in case of failures
            DB::beginTransaction();

            // Create the new team
            $team = Team::create($teamData);

            // Associate members with the team using the pivot table
            $team->users()->attach($members);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'message' => 'Team created successfully',
                'data' => $team,
            ], Response::HTTP_CREATED); // 201 state

        } catch (\Throwable $th) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            $errorMessage = $th->getMessage(); // Get the error message

            Log::error('Error creating team ' . $errorMessage);

            return response()->json([
                'message' => 'Error creating team: ' . $errorMessage, // Include the error message in the response
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
        }
    }

    // UPDATE TEAM 
    public function updateTeam(Request $request)
    {
    try {
        $teamData = $request->only('id');
        $members = $request->input('members', []);

        $teamId = $teamData['id'];
        $team = Team::findOrFail($teamId);

        // Sync the updated member list with the team's users
        $team->users()->sync($members);

        return response()->json([
            'message' => 'Team users updated successfully',
            'data' => $team,
        ], Response::HTTP_OK);

    } catch (\Throwable $th) {
        Log::error('Error updating team ' . $th->getMessage());
        return response()->json([
            'message' => 'Error updating team users'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
    }
}
}