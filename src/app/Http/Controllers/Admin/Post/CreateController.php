<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Source;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use jcobhams\NewsApi\NewsApi;

class CreateController extends BaseController
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke()
    {
        $newsApiKey = env('NewsApiKey');
        $newsApi = new NewsApi($newsApiKey);

        $categories = $newsApi->getCategories();
        $countries = $newsApi->getCountries();
        $languages = $newsApi->getLanguages();

        $sources = Source::all();

        return view('admin.post.create', compact( 'categories', 'countries', 'languages', 'sources'));
    }
}
