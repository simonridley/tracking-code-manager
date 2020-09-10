<?php

namespace Simonridley\TrackingCodeManager;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\CP\Nav;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $tags = [
        TrackingCodeTags::class,
    ];

    public function boot():void
    {
        parent::boot();
        Nav::extend(static function ($nav) {
            $nav->tools('Tracking Code Mgr')
                ->route('simonridley.tracking-code-manager.index')
                ->icon('performance-increase')
                  ->active('tracking-code-manager');
        });
    }
}
