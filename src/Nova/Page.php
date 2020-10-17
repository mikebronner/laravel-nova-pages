<?php

namespace GeneaLabs\LaravelNovaPages\Nova;

use GeneaLabs\LaravelNovaPages\Page as PageModel;
use GeneaLabs\NovaGutenberg\Gutenberg;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource as NovaResource;

class Page extends NovaResource
{
    public static $model = PageModel::class;
    public static $title = 'title';
    public static $search = [
        'title',
        'content',
    ];

    public static function label()
    {
        return "Custom Pages";
    }

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),
            Text::make("Title")
                ->help("Please use the official name of the repository or
                    archive. If it is your private collection, we recommend
                    using your own name.")
                ->sortable()
                ->rules("required"),
            Select::make("Layout")
                ->rules("required")
                ->displayUsingLabels()
                ->options([
                    "standard" => "Standard",
                    "full-width" => "Full-Width",
                ]),
            Gutenberg::make("Content")
                ->help("Here you can provide a little insight into the archive,
                    describe its goals, its history, etc. Viewers will see this
                    as the introduction on the public Archive page.")
                ->rules("required")
                ->hideFromIndex(),
            BelongsTo::make("Author", "author", User::class)
                ->withMeta([
                    "belongsToId" => $this->resource->governor_owned_by
                        ?: auth()->user()->id,
                ])
                ->searchable()
                ->hideFromIndex(),
            DateTime::make("Published At"),
            DateTime::make("Created At")
                ->onlyOnDetail(),
            DateTime::make("Updated At")
                ->onlyOnDetail(),
        ];
    }
}
