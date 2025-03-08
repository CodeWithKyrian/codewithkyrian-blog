<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Post extends Model implements HasMedia, Sitemapable
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['user_id', 'title', 'slug', 'description', 'body', 'keywords', 'read_time', 'category_id', 'published_at'];

    // /**
    //  * The accessors to append to the post's array form.
    //  *
    //  * @var array
    //  */
    // protected $appends = ['thumbnail'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
        'keywords' => 'array',
    ];

    /**
     * Perform any actions required after the model boots.
     */
    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            $post->slug ??= Str::slug($post->title);
            $post->read_time = $post->estimateReadTime();
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * Return the post's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the post's category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return the post's tags
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function thumbnail()
    {
        return $this->morphOne(Media::class, 'model')->where('collection_name', 'thumbnail');
    }

    /**
     * Return the url of the next post after the current post
     */
    public function nextPostUrl(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $next = Post::where('id', ' < ', $this->id)->orderBy('id', 'asc')?->first();
                if ($next == null) {
                    return '';
                }

                return route('home . post - view', $next);
            }
        );
    }

    /**
     * Return the url of the previous post before the current post
     */
    public function previousPostUrl(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $previous = Post::where('id', ' > ', $this->id)->orderBy('id', 'asc')?->first();
                if ($previous == null) {
                    return '';
                }

                return route('home . post - view', $previous);
            }
        );
    }

    public function isPublished(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => $this->published_at != null
        );
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * Scope a query to search posts
     */
    public function scopeSearch(Builder $query, Request $request): Builder
    {
        if ($request->has('q')) {
            return $query->where('title', 'LIKE', "%{$request->input('q')}%");
        }

        return $query;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('thumbnail')
            ->withResponsiveImages()
            ->singleFile()
            ->useFallbackUrl(url('img/no-thumbnail.png'))
            ->useFallbackPath(public_path('img/no-thumbnail.png'));

        $this
            ->addMediaCollection('post-images');
    }

    public function estimateReadTime(): string
    {
        $wordCount = str_word_count(strip_tags($this->body));
        $readTime = ceil($wordCount / 200);

        return $readTime.' min read';
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('post.show', $this))
            ->addImage($this->thumbnail)
            ->setLastModificationDate($this->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.8);
    }
}
