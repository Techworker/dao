<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Contract extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Contract';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static $group = 'DAO';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

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

            Text::make('Latest Status', function () {
                if($this->latestStatus() !== null) {
                    return \App\Contract::STATUS[(string)$this->latestStatus()];
                }

                return null;
            })->hideWhenCreating()->hideWhenUpdating(),

            Currency::make('Total_value')
                ->format('%.2n')
                ->hideFromIndex()
                ->hideFromDetail(),

            Text::make('Value', function () {
                if($this->total_currency !== null) {
                    return $this->total_value;
                }
                return null;
            })->hideWhenCreating()->hideWhenUpdating(),

            Boolean::make('Needs Feedback')
                ->hideFromIndex(),

            Date::make('Start Date'),

            Date::make('Payment Date'),

            MorphMany::make('Statuses', 'statuses', Status::class)
                ->hideFromIndex(),

            BelongsTo::make('Proposal'),

            Text::make('role')
                ->hideFromIndex(),

            Textarea::make('role description')
                ->hideFromIndex(),

            Textarea::make('payment description')
                ->hideFromIndex(),

            Text::make('pasa')
                ->hideFromIndex(),

            Text::make('payload_overwrite')
                ->hideFromIndex(),

            BelongsTo::make('Contractor')
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
