<?php

namespace AnyImage\Moderation\Nova;

use AnyImage\Moderation\Nova\Actions\Approve;
use AnyImage\Moderation\Nova\Actions\ApproveDomain;
use App\Nova\Resource;
use App\Nova\User;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class WhitelistRequest extends Resource
{
    public static $group = 'Moderation';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = '\AnyImage\Moderation\Models\WhitelistRequest';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('First Name'),
            Text::make('Email'),
            Text::make('URL'),
            BelongsTo::make('User', 'user', User::class),
            Boolean::make('Approved')->onlyOnIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new Approve(),
            new ApproveDomain(),
        ];
    }
}
