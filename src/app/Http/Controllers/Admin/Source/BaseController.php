<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Service\SourceService;

class BaseController extends Controller
{
    public SourceService $service;

    /**
     * @param SourceService $service
     */
    public function __construct(SourceService $service)
    {
        $this->service = $service;
    }
}
