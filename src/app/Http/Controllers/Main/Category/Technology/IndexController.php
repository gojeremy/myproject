<?php

namespace App\Http\Controllers\Main\Category\Technology;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $posts = Cache::remember('postsMainCategoryTechnologyIndex', now()->addMinutes(5), function () {
            return Post::where('published', 1)
                ->where('category', 'technology')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'author', 'description', 'category'])
                ->paginate(27);
        });
        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('postsMainCategoryTechnologyIndex');

        $offers = Cache::remember('offersMainCategoryTechnologyIndex', now()->addMinutes(5), function () {
            return Offer::where('published', 1)
                ->whereNotNull('urlToImage')
                ->orderBy('priority_id', 'desc')
                ->select(['id', 'title', 'urlToImage', 'url'])
                ->get();
        });
        // Данные были закэшированы, и теперь, если вы хотите сбросить кэш, добавьте следующую строку:
         Cache::forget('offersMainCategoryTechnologyIndex');

        $tags = ['hot', 'popular', 'recommended'];
        $taggedPosts = [];

        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $posts->splice(0, 9); // Берем первые 27 элементов (посты в порядке)
        }

        $mobile_offer = $offers->splice(0, 1);
        //   dd($modal_offer);
        $desctop_offers = $offers->splice(0, 6);

        // footer: 3 элемента
        $footer_posts = Post::all();
        $footer = $footer_posts->take(3);

        return view('main.category.technology.index', compact('taggedPosts', 'tags', 'posts', 'mobile_offer', 'desctop_offers', 'footer'));
    }
}
