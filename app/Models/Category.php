<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model implements Sitemapable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'parent_id', 'description'];

    /**
     * Perform any actions required after the model boots.
     */
    protected static function booted(): void
    {
        static::saving(fn (Category $category) => $category->slug = Str::slug($category->title));
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
     * Get the posts for the category.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    /**
     * Get categories that are parents
     */
    public function scopeParentsOnly($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Get categories that are children
     */
    public function scopeChildrenOnly($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Get the ordered categories.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('title', 'asc');
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('category.show', $this))
            ->setLastModificationDate($this->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.4);
    }
}
