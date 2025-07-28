<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Team extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Team::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        return $this->city ? $this->city : '';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'city', 'coach_name',
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

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make('Logo', 'logo_url')
                ->disk('public')
                ->path('photos')
                ->nullable()
                ->rules('nullable', 'image', 'max:2048')
                ->help('Maximum file size: 2MB. Supported formats: jpg, png, gif')
                ->prunable(),

            Text::make('City')
                ->sortable()
                ->nullable()
                ->rules('nullable', 'max:255'),

            Text::make('Coach Name')
                ->nullable()
                ->rules('nullable', 'max:255'),

            Number::make('Founded Year')
                ->min(1800)->max(date('Y'))
                ->nullable()
                ->rules('nullable', 'integer', 'min:1800', 'max:' . date('Y')),

            Textarea::make('Description')
                ->nullable()
                ->rules('nullable')
                ->hideFromIndex(),

            HasMany::make('Players'),

            BelongsToMany::make('Games')
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