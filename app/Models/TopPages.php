<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class TopPages extends Model
{
    use Sushi;

    public function getRows(): array
    {
        $topPages = Http::withToken(config('services.plausible.key'))
            ->get(config('services.plausible.base_url') . '/api/v1/stats/breakdown', [
                'site_id' => config('services.plausible.domain'),
                'property' => 'event:page',
                'metrics' => 'visitors,pageviews',
                'period' => '6mo',
                'limit' => 5,
            ])
            ->json();

        return $topPages['results'];
    }
}
