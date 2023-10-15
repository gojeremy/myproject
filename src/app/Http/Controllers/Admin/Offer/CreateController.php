<?php

namespace App\Http\Controllers\Admin\Offer;

use jcobhams\NewsApi\NewsApi;
use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {
        $apiKey = env('NewsApiKey');
        $newsApi = new NewsApi($apiKey);

        $categories = $newsApi->getCategories();
        $countries = $newsApi->getCountries();
        $languages = $newsApi->getLanguages();
        return view('admin.offer.create', compact('categories', 'countries', 'languages'));
    }
}
