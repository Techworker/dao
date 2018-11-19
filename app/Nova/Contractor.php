<?php

namespace App\Nova;

use App\Nova\Filters\ContractorStatus;
use App\Nova\Filters\UserStatus;
use App\Nova\Lenses\ContractorsToApprove;
use App\Nova\Metrics\Contractors;
use App\Nova\Metrics\ContractorsPerStatus;
use App\Nova\Metrics\ContractorsPerType;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

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

            Text::make('Ident Code'),
            Text::make('Public name')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('User'),
            Select::make('Type')->options(\App\Contractor::TYPES)->resolveUsing(function ($name) {
                return \App\Contractor::TYPES[$name];
            })->hideFromIndex(),

            Text::make('Pasa')->hideFromIndex(),

            Text::make('Company name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('First Name'),
            Text::make('Last Name'),
            Textarea::make('Bio'),
            Textarea::make('Notes'),

            MorphMany::make('Statuses', 'statuses', Status::class),
            HasMany::make('Address', 'addresses', Address::class),
            HasMany::make('Contact details', 'contactDetails', ContactDetail::class),
            HasMany::make('Proposals', 'proposals', Proposal::class),
            HasMany::make('Contracts', 'contracts', Contract::class)
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
        return [
            new ContractorsPerType(),
            new ContractorsPerStatus()
        ];
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
            new ContractorStatus()
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
        return [
            new ContractorsToApprove()
        ];
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
