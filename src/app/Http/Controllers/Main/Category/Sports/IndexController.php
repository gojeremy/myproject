<?php

namespace App\Http\Controllers\Main\Category\Sports;

use App\Http\Controllers\Main\Category\BaseController;

class IndexController extends BaseController
{
    public function __construct()
    {
        parent::__construct('sports');
    }
}
