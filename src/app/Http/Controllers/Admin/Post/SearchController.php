<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Source;
use jcobhams\NewsApi\NewsApi;

class SearchController extends BaseController
{
    public function __invoke()
    {
        $sources = Source::all();
        $newsApiKey = env('NewsApiKey');
        $newsApi = new NewsApi($newsApiKey);

        $categories = $newsApi->getCategories();
        $languages = $newsApi->getLanguages();

        $countries = $newsApi->getCountries();
      //  $languages = $newsApi->getLanguages();
     //   $sources = 'business-insider';
     //   $test = $newsApi->getTopHeadlines( 'crypto',null, 'us', 'business', '10', '1');
     //   $test = $newsApi->getTopHeadlines( 'ходаковский','google-news-ru', null, null, '10', '1');

     //   $test = $newsApi->getSortBy();
     //   $test = $newsApi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);

        return view('admin.post.find', compact('sources', 'countries', 'categories', 'languages'));
    }
}
