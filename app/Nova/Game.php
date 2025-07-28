<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;

class Game extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Game::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        return $this->date_time ? $this->date_time->format('M d, Y H:i') . ' - ' . $this->location_name : '';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'location_name', 'description',
    ];

    public static $group = 'Sports Management';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            DateTime::make('Date Time', 'date_time')
                ->sortable()
                ->rules('required')
                ->withMeta(['timezone' => config('app.timezone', 'UTC')]),

            Text::make('Location Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Number::make('Location Latitude')
                ->min(-90)->max(90)->step(0.0000001)
                ->rules('required', 'numeric', 'between:-90,90')
                ->help('Latitude must be between -90 and 90'),

            Number::make('Location Longitude')
                ->min(-180)->max(180)->step(0.0000001)
                ->rules('required', 'numeric', 'between:-180,180')
                ->help('Longitude must be between -180 and 180'),

            Text::make('Broadcasted On')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('TV channel or streaming platform'),

            Text::make('Broadcast Link')
                ->nullable()
                ->rules('nullable', 'url', 'max:255')
                ->hideFromIndex(),

            Textarea::make('Description')
                ->nullable()
                ->rules('nullable')
                ->hideFromIndex(),

            Select::make('Status')->options([
                'scheduled' => 'Scheduled',
                'live' => 'Live',
                'finished' => 'Finished',
            ])->displayUsingLabels()
                ->sortable()
                ->rules('required', 'in:scheduled,live,finished'),

            Code::make('Score Json', 'score_json')
                ->json()
                ->nullable()
                ->rules('nullable', 'json')
                ->hideFromIndex()
                ->help('JSON format for storing game scores'),

            BelongsToMany::make('Teams')
                ->searchable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}