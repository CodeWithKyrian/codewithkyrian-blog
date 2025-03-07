<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Programming Tutorials and Guides')]
class HomePage extends Component
{
    use WithPagination;

    public function render(): View
    {
        $query = Post::published()
            ->with('category', 'tags')
            ->latest('published_at');

        $posts = $this->paginate($query, 7, 8);

        if ($this->getPage() === 1 && $posts->count() > 0) {
            $posts->first()->load('thumbnail');
        }

        $tags = Tag::withCount('posts')
            ->whereHas('posts')
            ->orderByDesc('posts_count')
            ->limit(6)
            ->get();

        return view('livewire.home-page', compact('posts', 'tags'));
    }

    /**
    //  * @return LengthAwarePaginator|Collection<int, Post>
     * @throws BindingResolutionException
     */
    public function paginate(Builder $query, $perFirstPage = null, $perPage = null, array|string $columns = ['*'], string $pageName = 'page', ?int $page = null): LengthAwarePaginator
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);

        $perPage = $perPage ?: $query->getModel()->getPerPage();
        $perFirstPage = $perFirstPage ?: $perPage;

        $skip = match ($page) {
            1 => 0,
            default => $perFirstPage + ($page - 2) * $perPage,
        };

        $realPerPage = match ($page) {
            1 => $perFirstPage,
            default => $perPage,
        };

        $results = ($total = $query->toBase()->getCountForPagination())
            ? $query->offset($skip)->limit($realPerPage)->get($columns)
            : $query->getModel()->newCollection();

        return Container::getInstance()->makeWith(LengthAwarePaginator::class, [
            'items' => $results,
            'total' => $total,
            'perPage' => $realPerPage,
            'currentPage' => $page,
            'options' => [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
                'perPage' => $perPage,
                'perFirstPage' => $perFirstPage,
            ],
        ]);
    }
}
