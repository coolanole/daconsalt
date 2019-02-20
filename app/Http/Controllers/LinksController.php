<?php

namespace App\Http\Controllers;

use App\Links;
use App\Jobs\ProcessLinkStatistics;

class LinksController extends Controller
{
    public function redirect(string $key)
    {
        $link = Links::where('key', $key)->firstOrFail();
        ProcessLinkStatistics::dispatch($link, [
            'ip' => request()->ip(),
            'useragent' => request()->userAgent()
        ]);

        return redirect($link->url);
    }
}
