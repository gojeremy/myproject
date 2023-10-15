<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Models\Offer;
use jcobhams\NewsApi\NewsApi;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Offer $offer): View
    {
        $apiKey = env('NewsApiKey');
        $newsApi = new NewsApi($apiKey);

        $categories = $newsApi->getCategories();
        $countries = $newsApi->getCountries();
        $languages = $newsApi->getLanguages();

        return view('admin.offer.edit', compact('offer', 'categories', 'countries', 'languages'));
    }
}
