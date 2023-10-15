<?php

namespace App\Http\Controllers\Admin\Post\Search\Category;

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
        $sources = Source::all();

        $newsApiKey = env('NewsApiKey');
        $newsApi = new NewsApi($newsApiKey);

        $categories = $newsApi->getCategories();
        $languages = $newsApi->getLanguages();
        $countries = $newsApi->getCountries();

        return view('admin.post.search.category.index', compact('sources', 'countries', 'categories', 'languages'));
    }
}
