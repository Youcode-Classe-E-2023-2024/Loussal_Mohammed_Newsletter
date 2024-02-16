<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\BrowserStatistic;

class BrowserStatisticMiddleware
{
    public function handle($request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');

        // Extract browser name from user agent
        $browser = $this->getBrowserName($userAgent);

        // Update or create statistics for the browser
        BrowserStatistic::updateOrCreate(
            ['browser' => $browser],
            ['count' => \DB::raw('count + 1')]
        );

        return $next($request);
    }

    protected function getBrowserName($userAgent)
    {
        $browserNames = [
            'Chrome' => 'Chrome',
            'OPR' => 'Opera',
            'Avast' => 'Avast',
            'Edg' => 'Edge',
            // Add more browsers as needed
        ];

        foreach ($browserNames as $needle => $browserName) {
            if (stripos($userAgent, $needle) !== false) {
                return $browserName;
            }
        }

        return 'Other'; // If the browser is not recognized, you can label it as 'Other'
    }
}
