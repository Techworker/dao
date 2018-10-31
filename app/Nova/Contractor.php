<?php

namespace App\Nova;

use App\Nova\Filters\UserStatus;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;

class Contractor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Contractor';

    public static $group = 'DAO';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'company_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email', 'company_name'
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

            BelongsTo::make('User'),
            Select::make('Type')->options(\App\Contractor::TYPES),

            Text::make('Pasa'),

            Text::make('Company name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('First Name'),
            Text::make('Last Name'),
            Textarea::make('Bio'),
            Textarea::make('Notes'),

            HasMany::make('Address', 'addresses', Address::class),
            HasMany::make('Contact details', 'contactDetails', ContactDetail::class),
            HasMany::make('Proposals', 'proposals', Proposal::class),
            BelongsToMany::make('Contracts', 'contracts', Contract::class)->fields(function () {
                return [
                    Number::make('Percent'),
                    Select::make('Type')->options([
                        'no_pay' => 'No Pay',
                        'payable' => 'Payable'
                    ]),
                    Text::make('role'),
                    Textarea::make('role_description'),
                    Text::make('pasa'),
                    Text::make('payload'),
                ];
            }),
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
        return [
            new UserStatus()
        ];
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
