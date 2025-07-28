@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4 text-center fw-bold">Upcoming Games</h1>
            
            @if($upcomingGames->isEmpty())
                <div class="alert alert-info text-center">
                    <p class="mb-0">No upcoming games scheduled at the moment.</p>
                </div>
            @else
                <div class="row g-3">
                    @foreach($upcomingGames as $game)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm game-card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">{{ is_string($game->title) ? $game->title : 'Game Title' }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <i class="bi bi-calendar-event"></i>
                                        <strong>Date & Time:</strong>
                                        <div class="text-muted">
                                            {{ $game->date_time->format('l, F j, Y') }}
                                            <br>
                                            {{ $game->date_time->format('g:i A') }}
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <i class="bi bi-geo-alt"></i>
                                        <strong>Location:</strong>
                                        <div class="text-muted">{{ is_string($game->location_name) ? $game->location_name : 'Location not available' }}</div>
                                    </div>
                                    
                                    @if($game->teams->count() > 0)
                                        <div class="mb-3">
                                            <i class="bi bi-people"></i>
                                            <strong>Teams:</strong>
                                            <div class="d-flex flex-wrap gap-2 mt-1">
                                                @foreach($game->teams as $team)
                                                    <span class="badge bg-secondary">{{ is_string($team->name) ? $team->name : 'Team Name' }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    
                                    @if($game->description)
                                        <div class="mb-3">
                                            <i class="bi bi-info-circle"></i>
                                            <strong>Description:</strong>
                                            <div class="text-muted small">{{ is_string($game->description) ? Str::limit($game->description, 100) : 'Description not available' }}</div>
                                        </div>
                                    @endif
                                    
                                    @if($game->broadcasted_on)
                                        <div class="mb-3">
                                            <i class="bi bi-broadcast"></i>
                                            <strong>Broadcast:</strong>
                                            <div class="text-muted">
                                                {{ is_string($game->broadcasted_on) ? $game->broadcasted_on : 'Broadcast info not available' }}
                                                @if($game->broadcast_link)
                                                    <a href="{{ $game->broadcast_link }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                                                        <i class="bi bi-play-circle"></i> Watch
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="text-center">
                                        <span class="badge bg-{{ $game->status === 'scheduled' ? 'info' : ($game->status === 'live' ? 'danger' : 'success') }}">
                                            {{ ucfirst($game->status) }}
                                        </span>
                                    </div>
                                </div>
                                @if($game->location_latitude && $game->location_longitude)
                                    <div class="card-footer bg-light">
                                        <a href="https://maps.google.com/?q={{ $game->location_latitude }},{{ $game->location_longitude }}" 
                                           target="_blank" 
                                           class="btn btn-sm btn-outline-secondary w-100">
                                            <i class="bi bi-map"></i> View on Map
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            
            @if($pastGames->isNotEmpty())
                <h2 class="mt-5 mb-4 text-center fw-bold">Recent Games</h2>
                <div class="row g-3">
                    @foreach($pastGames as $game)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm game-card opacity-75">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="card-title mb-0">{{ is_string($game->title) ? $game->title : 'Game Title' }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <small class="text-muted">
                                            {{ $game->date_time->format('M j, Y - g:i A') }}
                                        </small>
                                    </div>
                                    
                                    
                                    <div class="text-center">
                                        <span class="badge bg-dark">Finished</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .game-card {
        transition: transform 0.2s ease-in-out;
        border: none;
    }
    
    .game-card:hover {
        transform: translateY(-5px);
    }
    
    @media (max-width: 576px) {
        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        h1 {
            font-size: 1.75rem;
        }
        
        h2 {
            font-size: 1.5rem;
        }
        
        .card-body {
            padding: 1rem;
        }
    }
    
    .bi {
        margin-right: 5px;
        color: #6c757d;
    }
</style>
@endsection