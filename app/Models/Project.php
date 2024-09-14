<?php

namespace App\Models;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'url',
        'icon',
        'technologies',
        'type',
        'meta',
    ];

    protected $casts = [
        'technologies' => 'array',
        'meta' => 'array',
        'type' => ProjectType::class,
    ];

    /**
     * Return the url of the post's banner image
     */
    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('thumbnail')
        );
    }

    public function registerMediaCollections(): void
    {
        $name = urlencode($this->name);

        $this
            ->addMediaCollection('thumbnail')
            ->useDisk('thumbnails')
            ->singleFile()
            ->useFallbackUrl("https://placehold.co/600x1000?text={$name}");
    }
}
