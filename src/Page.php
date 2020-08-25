<?php

namespace GeneaLabs\LaravelNovaPages;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model implements OverridableModel
{
    use Overridable;
    use Sluggable;

    protected $casts = [
        "published_at" => "datetime",
    ];
    protected $fillable = [
        "author_id",
        "content",
        "published_at",
        "slug",
        "title",
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
