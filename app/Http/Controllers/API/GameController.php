<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of games.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $games = Game::with(['teams.players'])
            ->orderBy('date_time', 'desc')
            ->paginate(20);

        return GameResource::collection($games);
    }

    /**
     * Display the specified game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $game = Game::with(['teams.players'])->findOrFail($id);

        return new GameResource($game);
    }
}