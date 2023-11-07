<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;

class BaseController extends Controller
{
      public CategoryService $service;

    /**
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service)
      {
          $this->service = $service;
      }
}
