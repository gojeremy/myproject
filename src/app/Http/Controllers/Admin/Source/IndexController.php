<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\View\View;
use jcobhams\NewsApi\NewsApi;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $sources = Source::paginate(7);

        $apiKey = env('NewsApiKey');
        $newsApi = new NewsApi($apiKey);
        $categories = $newsApi->getCategories();

        return view('admin.source.index', compact('sources', 'categories'));
    }
}
