<?php

namespace App\Http\Controllers\API;

use App\Links;
use App\Http\Requests\LinkCreationRequest;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Сreating links through API
     *
     * @param LinkCreationRequest $request
     * @return mixed
     */
    public function store(LinkCreationRequest $request)
    {
        return Links::create($request->all());
    }
}
