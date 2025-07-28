<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    /**
     * Display a listing of all teams
     */
    public function index(): JsonResponse
    {
        $teams = Team::with(['players', 'games' => function($query) {
            $query->orderBy('date_time', 'desc')->limit(5);
        }])->get();

        return response()->json([
            'success' => true,
            'data' => $teams,
            'message' => 'Teams retrieved successfully'
        ]);
    }

    /**
     * Display the specified team
     */
    public function show($id): JsonResponse
    {
        $team = Team::with(['players', 'games' => function($query) {
            $query->orderBy('date_time', 'desc');
        }])->find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $team,
            'message' => 'Team retrieved successfully'
        ]);
    }

    /**
     * Get team's upcoming games
     */
    public function upcomingGames($id): JsonResponse
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found'
            ], 404);
        }

        $upcomingGames = $team->games()
            ->where('date_time', '>=', now())
            ->where('status', '!=', 'finished')
            ->orderBy('date_time', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $upcomingGames,
            'message' => 'Upcoming games retrieved successfully'
        ]);
    }

    /**
     * Get team's past games
     */
    public function pastGames($id): JsonResponse
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found'
            ], 404);
        }

        $pastGames = $team->games()
            ->where(function($query) {
                $query->where('date_time', '<', now())
                      ->orWhere('status', 'finished');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $pastGames,
            'message' => 'Past games retrieved successfully'
        ]);
    }

    /**
     * Get team's players
     */
    public function players($id): JsonResponse
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Team not found'
            ], 404);
        }

        $players = $team->players;

        return response()->json([
            'success' => true,
            'data' => $players,
            'message' => 'Team players retrieved successfully'
        ]);
    }
}