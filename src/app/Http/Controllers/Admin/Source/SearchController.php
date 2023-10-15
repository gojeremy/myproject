<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Models\Source;
use jcobhams\NewsApi\NewsApi;
use jcobhams\NewsApi\NewsApiException;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        try{
            $apiKey = env('NewsApiKey');
            $newsApi = new NewsApi($apiKey);

            $sources = Source::all()->unique();
            $categories = $newsApi->getCategories();
            $countries = $newsApi->getCountries();
            $languages = $newsApi->getLanguages();

        return view('admin.source.search', compact('categories', 'countries', 'languages'));
        }catch (NewsApiException $e) {
            abort(500, 'Ошибка при запросе источников новостей');
        }
    }
}
