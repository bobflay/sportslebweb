<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Player extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Player::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'full_name';

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        $subtitle = '';
        if ($this->team) {
            $subtitle = $this->team->name;
            if ($this->number) {
                $subtitle .= ' - #' . $this->number;
            }
        }
        return $subtitle;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'position',
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

            BelongsTo::make('Team')
                ->sortable()
                ->searchable()
                ->rules('required', 'exists:teams,id'),

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Full Name', function () {
                return $this->first_name . ' ' . $this->last_name;
            })->onlyOnIndex(),

            Text::make('Position')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('e.g., Forward, Guard, Center'),

            Number::make('Number')
                ->min(0)->max(99)
                ->nullable()
                ->rules('nullable', 'integer', 'min:0', 'max:99'),

            Image::make('Photo', 'photo_url')
                ->disk('public')
                ->path('photos')
                ->nullable()
                ->rules('nullable', 'image', 'max:2048')
                ->help('Maximum file size: 2MB. Supported formats: jpg, png, gif')
                ->prunable(),

            Date::make('Date of Birth')
                ->nullable()
                ->rules('nullable', 'date', 'before:today')
                ->help('Player must be born before today'),

            Text::make('Age', function () {
                if ($this->date_of_birth) {
                    return now()->diffInYears($this->date_of_birth) . ' years';
                }
                return '-';
            })->onlyOnDetail(),
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