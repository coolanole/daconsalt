<?php

namespace App\Http\Controllers;

use App\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function redirect(string $key)
    {
        $links = Links::where('key', $key)->firstOrFail();

        return redirect($links->url);
    }
}
