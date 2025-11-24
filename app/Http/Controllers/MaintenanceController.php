<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    public function __invoke(Request $request)
    {
        $providedToken = (string) $request->query('token', '');
        $expectedToken = (string) config('app.maintenance.token', '');

        if ($expectedToken === '' || ! hash_equals($expectedToken, $providedToken)) {
            return response()->json([
                'ok' => false,
                'error' => 'Invalid token',
            ], 403);
        }

        $action = (string) $request->query('action', 'migrate');

        $allowedActions = [
            'migrate',
            'migrate:fresh',
            'db:seed',
            'optimize',
            'queue:restart',
            "route:list",
            "storage:link",
            "sitemap:generate",
            "posts:cleanup-images",
        ];

        if (! in_array($action, $allowedActions, true)) {
            return response()->json([
                'ok' => false,
                'error' => 'Invalid action',
            ], 400);
        }

        switch ($action) {
            case 'migrate':
                Artisan::call('migrate', ['--force' => true]);
                break;
            case 'migrate:fresh':
                Artisan::call('migrate:fresh', ['--force' => true]);
                break;
            case 'db:seed':
                Artisan::call('db:seed', ['--force' => true]);
                break;
            case 'optimize':
                Artisan::call('optimize');
                break;
            case 'queue:restart':
                Artisan::call('queue:restart');
                break;
            case 'route:list':
                Artisan::call('route:list');
                break;
            case 'storage:link':
                Artisan::call('storage:link');
                break;
            case 'sitemap:generate':
                Artisan::call('sitemap:generate');
                break;
            case 'posts:cleanup-images':
                Artisan::call('posts:cleanup-images');
                break;
        }

        return response()->json([
            'ok' => true,
            'action' => $action,
            'output' => Artisan::output(),
        ]);
    }
}
