<?php

namespace App\Http\Controllers\Main\Category\Business;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::where('published', 1)
            ->where('category', 'business')
            ->select(['id', 'title', 'urlToImage', 'author', 'description', 'category'])
            ->orderBy('priority_id', 'desc')
            ->paginate(27);

        $tags = ['hot', 'popular', 'recommended'];
        $taggedPosts = [];

        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $posts->splice(0, 9); // Берем первые 27 элементов (посты в порядке)
        }

        $offers = Offer::where('published', 1)
            ->orderBy('priority_id', 'desc')
            ->get();

        $mobile_offer = $offers->take(1);
        //   dd($modal_offer);
        $desctop_offers = $offers->take(6);

        // footer: 3 элемента
        $footer_posts = Post::all();
        $footer = $footer_posts->take(3);

        return view('main.category.business.index', compact('taggedPosts', 'tags', 'posts', 'mobile_offer', 'desctop_offers', 'footer'));
    }
}
