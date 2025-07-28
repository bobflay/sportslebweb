<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GameController extends Controller
{
    public function index()
    {
        $upcomingGames = Game::with('teams')
            ->where('date_time', '>=', Carbon::now())
            ->where('status', '!=', 'finished')
            ->orderBy('date_time', 'asc')
            ->get();

        $pastGames = Game::with('teams')
            ->where(function($query) {
                $query->where('date_time', '<', Carbon::now())
                      ->orWhere('status', 'finished');
            })
            ->orderBy('date_time', 'desc')
            ->limit(5)
            ->get();

        return view('games.index', compact('upcomingGames', 'pastGames'));
    }
}