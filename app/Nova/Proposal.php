<?php

namespace App\Nova;

use App\MoneyValue;
use App\Nova\Filters\ProposalStatus;
use App\Nova\Lenses\ProposalsToApprove;
use App\Nova\Metrics\ProposalsPerStatus;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Proposal extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Proposal';

    public static $group = 'DAO';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

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
            Text::make('Ident Code'),
            BelongsTo::make('Contractor', 'proposerContractor'),
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Latest Status', function () {
                return \App\Proposal::STATUS_TYPES[(string)$this->latestStatus()];
            }),
            Textarea::make('Description')->alwaysShow(),
            Textarea::make('Payment Proposal')->alwaysShow(),
            Text::make('Website')->hideFromIndex(),
            Text::make('Source Code')->hideFromIndex(),
            Number::make('Proposed Value')->hideFromIndex(),
            Select::make('Proposed Currency')->options(
                MoneyValue::TYPES
            )->hideFromIndex()->resolveUsing(function ($name) {
                return MoneyValue::TYPES[$name];
            }),
            Image::make('Logo')->disk('public')->path('proposals')->hideFromIndex(),
            MorphMany::make('All Statuses', 'statuses', Status::class),

            HasMany::make('Contracts', 'contracts', Contract::class),
            HasMany::make('Comments', 'comments', Comment::class),
            HasMany::make('ProposalDocument', 'documents', ProposalDocument::class)
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
            new ProposalsPerStatus()
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
            new ProposalStatus()
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
            new ProposalsToApprove()
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
