<?php

namespace App\Http\Controllers\Main\Category\General;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::where('published', 1)
            ->where('category', 'general')
            ->orderBy('priority_id', 'desc')
            ->paginate(36);

        $tags = ['hot', 'popular', 'recommended', 'general'];
        $taggedPosts = [];

        foreach ($tags as $tag) {
            $taggedPosts[$tag] = $posts->splice(0, 9); // Берем первые 12 элементов (посты в порядке)
        }

        $offers = Offer::where('published', 1)
            ->orderBy('priority_id', 'desc')
            ->get();

        $mobile_offer = $offers->take(1);
        //   dd($modal_offer);
        $desctop_offers = $offers->take(6);
        return view('main.category.general.index', compact('taggedPosts', 'tags', 'posts', 'mobile_offer', 'desctop_offers'));
    }
}
