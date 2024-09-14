<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Http;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '20s';

    protected function getStats(): array
    {
        $aggregates = Http::withToken(config('services.plausible.key'))
            ->get(config('services.plausible.base_url').'/api/v1/stats/aggregate', [
                'site_id' => config('services.plausible.domain'),
                'metrics' => 'visitors,pageviews,visit_duration',
                'period' => '30d',
            ])
            ->json()['results'];

        $timeSeries = Http::withToken(config('services.plausible.key'))
            ->get(config('services.plausible.base_url').'/api/v1/stats/timeseries', [
                'site_id' => config('services.plausible.domain'),
                'metrics' => 'visitors,pageviews,visit_duration',
                'period' => '30d',
            ])
            ->json()['results'];

        return [
            Stat::make('Unique views', $aggregates['visitors']['value'])
                ->description('Unique visitors in the last 30 days')
                ->color('primary')
                ->chart(array_column($timeSeries, 'visitors')),

            Stat::make('Page views', $aggregates['pageviews']['value'])
                ->description('Total page views in the last 30 days')
                ->color('primary')
                ->chart(array_column($timeSeries, 'pageviews')),

            Stat::make('Average time on page', gmdate('i:s', $aggregates['visit_duration']['value']))
                ->description('Average time spent on the site in the last 30 days')
                ->color('primary')
                ->chart(array_column($timeSeries, 'visit_duration')),
        ];
    }
}
