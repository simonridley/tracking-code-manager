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
                ->icon('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M.75 23.25h22.5M6 17.25H3a.75.75 0 0 0-.75.75v5.25h4.5V18a.75.75 0 0 0-.75-.75zm7.5-7.5h-3a.75.75 0 0 0-.75.75v12.75h4.5V10.5a.75.75 0 0 0-.75-.75zm7.5 3h-3a.75.75 0 0 0-.75.75v9.75h4.5V13.5a.75.75 0 0 0-.75-.75zm2.25-7.5V.75h-4.5"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M23.25.75 18.2 5.8a2.249 2.249 0 0 1-2.237.564l-5.709-1.526a2.251 2.251 0 0 0-2.172.583L2.25 11.253"></path></svg>')
                ->active('tracking-code-manager');
        });
    }
}
