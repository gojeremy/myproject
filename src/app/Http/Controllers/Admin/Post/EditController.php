<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Source;
use jcobhams\NewsApi\NewsApi;
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * @param Post $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $newsApiKey = env('NewsApiKey');
        $newsApi = new NewsApi($newsApiKey);

        $categories = $newsApi->getCategories();
        $countries = $newsApi->getCountries();
        $languages = $newsApi->getLanguages();

        $sources = Source::all();

        return view('admin.post.edit', compact('post', 'categories', 'countries', 'languages', 'sources'));
    }
}
