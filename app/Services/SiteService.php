<?php
namespace App\Services;


use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Cache;

class SiteService
{
    public function getSiteData()
    {
        $cacheKey = 'site.data';
        $cacheTime = now()->addHours(6);

        return Cache::remember($cacheKey, $cacheTime, function () {
            return Setting::first();
        });
    }
}
