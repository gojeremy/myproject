<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.report.index');
    }
}
